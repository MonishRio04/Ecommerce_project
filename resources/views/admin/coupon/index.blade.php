@extends('admin.layout.headerandfooter')
@section('admincontent')
<main class="h-full pb-16 overflow-y-auto">
  {{-- MOdal --}}
  <div
  x-show="isModalOpen"
  x-transition:enter="transition ease-out duration-150"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"

  >
  <!-- Modal -->
  <div
  x-show="isModalOpen"
  x-transition:enter="transition ease-out duration-150"
  x-transition:enter-start="opacity-0 transform translate-y-1/2"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0  transform translate-y-1/2"
  @click.away="closeModal"
  @keydown.escape="closeModal"
  class="w-96 px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 "
  role="dialog"
  id="modal"style="width:70%"
  >
  <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
  {{--  --}}
  <!-- Modal body -->
  <div class="mb-2">
    <!-- Modal title -->
    <p
    class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300"
    >
    Create New Coupon
  </p>
  <!-- Modal description -->
  <p class="text-sm text-gray-700 dark:text-gray-400">
    <form method="POST" url="{{route('coupon.store')}}" id="couponform" class="max-w-lg">
      @csrf
      <div class="flex flex-wrap -mx-3 mb-2 w-full">
        <div class="px-3 w-1/2" style="width:50%">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="coupon_name">
            Coupon Name
          </label>
          <input class="appearance-none block w-96 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="coupon_name" name="coupon_name"type="text" placeholder="CASH100" style="width:100%">
          @error('coupon_name')
          <p style="color" class="text-red-50 text-xs italic">*{{$message}}</p>
          @enderror
        </div>
      <div class="px-3" style="width:50%">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="limit">Coupon Limit
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="coupon_limit" name="coupon_limit" type="tel" placeholder="10">
          @error('coupon_limit')
          <p style="color" class="text-red-50 text-xs italic">*{{$message}}</p>
          @enderror
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-2 w-full">
        <div class="px-3 w-1/2" style="width:50%">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="discount_amount">
            Discount Amount
          </label>
          <input class="appearance-none block w-96 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="discount_amount" name="discount_amount"type="text" placeholder="1000" style="width:100%">
          @error('discount_amount')
          <p style="color" class="text-red-50 text-xs italic">*{{$message}}</p>
          @enderror
        </div>
      <div class="px-3" style="width:50%">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="limit">Minimum Purchase
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="mini_purc" name="mini_purc" type="tel" placeholder="25000">
          @error('mini_purc')
          <p style="color" class="text-red-50 text-xs italic">*{{$message}}</p>
          @enderror
        </div>
      </div>
        <div class="flex flex-wrap mb-2 w-full">
    <div class="px-3 w-1/4" style="display: inline-block; width: 33%;">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="coupon_type">
           Coupon type
        </label>        
          <select name="coupon_type"
          style="background-color:transparent" 
           id="coupon_type" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option name="coupon_type" disabled selected>Select Type </option>
                  @foreach(couponlist() as $coupon)
                  <option name="coupon_type" value="{{$coupon}}" >{{ $coupon }}</option>
                  @endforeach
                </select>         
        @error('coupon_type')
        <p style="color" class="text-red-50 text-xs italic">*{{$message}}</p>
        @enderror
    </div>
    <div class="px-3 w-1/4" style="display: inline-block; width: 33%;">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="limit">
        Coupon condition</label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="coupon_condition" name="coupon_condition" type="tel" placeholder="25000">
        @error('coupon_condition')
        <p style="color" class="text-red-50 text-xs italic">*{{$message}}</p>
        @enderror
    </div>
   <div class="px-3 w-1/4" style="display: inline-block; width: 34%;">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Expiry Date
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="expire" name="expire"type="date">   
          @error('expire')
          <p style="color" class="text-red-50 text-xs italic">*{{$message}}</p>
          @enderror
        </div>
</div>

      <div class="flex flex-wrap -mx-3 mb-2">       
        
        <div class="px-3 w-1/2" style="width:50%">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="coupon_code">
           Coupon Code
          </label>
          <input class="appearance-none block w-96 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="coupon_code" name="coupon_code"type="text" placeholder="1000" style="width:100%">
          @error('coupon_code')
          <p style="color" class="text-red-50 text-xs italic">*{{$message}}</p>
          @enderror
        </div>
      <div class="w-full md:w-1/3 px-3 mt-2 md:mb-0" style="width:50%">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
            Status 
          </label>
         <div class="flex items-center ">
            <input id="active" type="radio" value="1" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="active" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
        </div>
        <div class="flex items-center">
            <input id="inactive" type="radio" value="0" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="inactive" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inactive</label>
        </div>
        </div>
{{-- id --}}
          <input type="hidden" id="copid" name="id" value="">
          <input type="hidden" id="datetime" name="datetime" value="">
{{--  --}}
          
        </div>
        <div class="px-3 w-1/2" style="width:100%">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
           Description
          </label>
          <textarea cols="1" rows="1" class="appearance-none block w-96 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" name="description"type="text" placeholder="1000" style="width:100%"></textarea>
          @error('description')
          <p style="color" class="text-red-50 text-xs italic">*{{$message}}</p>
          @enderror
        </div>

   
  </p>
</div>
<footer
class="flex flex-col items-center justify-end px-6 py-3 -mx-6 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
>
<button
@click="closeModal" type="button"
class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
>
Cancel
</button>
{{-- clear --}}
<button type="reset" id="clearbtn"  hidden></button>
{{--  --}}
<button type="submit" id="edit"
class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
>
Create
</button>
 </form>
</footer>
</div>
</div>
<!-- End of modal backdrop -->
<div class="container grid px-6 mx-auto">
  <div style="display:flex">
    <h2
    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
  Coupons</h2>

  <button style="margin:20px;margin-left:auto"  @click="openModal" id="addnew" 
  {{-- type="reset"  --}}
  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> Add new</button>
</div>
<script>
  $('#addnew').click(function(){
    $('#clearbtn').trigger('click');
  })
</script>
<h4
class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
>
</h4>
            {{-- <script>

              
            </script> --}}

            @if(Session::has('dlt'))
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <strong>!</strong> {{ Session::get('dlt') }}
            </div>
            @endif
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                    <th class="px-4 py-2">Coupon Code</th>
                    {{-- <th class="px-4 py-2">Coupon Name</th> --}}
                    <th class="px-4 py-2">No of uses</th>
                    <th class="px-4 py-2">Maximum <br>limit</th>
                    <th class="px-4 py-2">Discount <br> Amount</th>
                    <th class="px-4 py-2">Expires</th>
                    <th class="px-4 py-2">status</th>
                    <th class="px-4 py-2">minimum <br>purchase</th>                    
                     <th class="px-4 py-2">Coupon <br>condition</th>
                     <th class="px-4 py-2">Action</th>
                      {{-- <th class="px-4 py-2"></th> --}}
                  </tr>
                </thead>
                <tbody style="text-align:center" 
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                {{-- {{ dd($coupons) }} --}}
                @if($coupons->count()<=0)
                <tr>
                  <td class="px-4 py-3 text-center" colspan="5">No coupons</td>
                </tr>
                @endif
                {{-- {{dd($coupons)}} --}}
                @foreach($coupons as $coupon)
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">{{ $coupon->coupon_code }}</td>
                 {{--  <td class="px-4 py-3 text-sm">
                       {{ $coupon->coupon_name }}
               </td> --}}
               <td class="px-4 py-3 text-sm">
                {{ $coupon->uses!=null?$coupon->uses:0 }}
              </td>
             <td class="px-4 py-3 text-xs">
              {{$coupon->max_uses}}
            </td>
            <td class="px-4 py-3 text-sm">
              {{$coupon->discount_amount}}
            </td>
            <td class="px-4 py-3 text-sm">
              {{date('d-m-Y',strtotime($coupon->expires_at))}}
            </td>
            <td class="px-4 py-3 text-sm">  
                            {{$coupon->status==1?"active":'inActive'}}
            </td>
            <td class="px-4 py-3 text-sm">  
                            {{$coupon->minimum_purchase==null?'Applicable for All':$coupon->minimum_purchase}}
            </td>
            <td class="px-4 py-3 text-sm">  
                            {{$coupon->coupon_type}}<br>{{$coupon->coupon_condition}}
            </td>
            <td class="px-4 py-3">
              <div class="flex items-center space-x-4 text-sm">
                <button type="submit" id="editbtn" value="{{$coupon->id}}" 
                 {{-- href="{{ route('coupon.edit',$coupon->id) }}" --}} @click="openModal"
                  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray editbtn"
                  aria-label="Edit" data-edit_url="{{route('coupon.edit',[$coupon->id])}}">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                  viewBox="0 0 20 20">
                  <path
                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                </path>
              </svg>
            </button>              
            <form method="post" action="{{ route('coupon.destroy',$coupon->id )}}">
              {{ csrf_field() }}{{ method_field('DELETE') }}
              <button type="submit" onclick="return confirm('do you want to delete')"
              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
              aria-label="Delete">
              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
              viewBox="0 0 20 20">
              <path fill-rule="evenodd"
              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
              clip-rule="evenodd"></path>
            </svg>
          </button>
        </form>
      </div>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
</div>
<script>
  $('#clear').click(function(){$('#couponform').reset()});
    $(document).on('click','.editbtn',function(){
          var url = $(this).data('edit_url');
        $.ajax({
        url:url,
        type:'GET',
        success:function(response){
          console.log(response.id);
            $('#coupon_code').val(response.coupon_code);
            $('#coupon_name').val(response.coupon_name);
            $('#coupon_limit').val(response.max_uses );
            $('#coupon_type').val(response.coupon_type);
            $('#coupon_condition').val(response.coupon_condition);
            $('#description').val(response.description);
            $('#copid').val(response.id);
            $('#discount_amount').val(response.discount_amount);
            $('#expire').attr('type','text').val(response.date);
            $('#expire').click(function(){
              $(this).attr('type','date');
              });
            $('#mini_purc').val(response.minimum_purchase);
            $('#datetime').val(response.expires_at);
            $('#edit').text('Edit');
            if(response.status==0) $('#inactive').prop('checked',true) 
              else $('#active').prop('checked',true);
        }
      });
    });
</script>
</div>
</div>
</main>

@endsection