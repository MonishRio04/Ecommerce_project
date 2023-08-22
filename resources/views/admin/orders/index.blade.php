@extends('admin.layout.headerandfooter')
@section('admincontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">    
    <div class="flex bg-green-200 p-4 mx-16 ">
        <div class="flex-1 bg-green-500 rounded-lg"><h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Order list</h4>
        </div>
        <a href="{{url('allorders-pdf')}}" style="margin: 10px;" 
       class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <span><i class="fa fa-download"></i> Export Pdf</span>
        <a href="{{url('export-orders')}}" style="margin: 10px;" 
       class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <span><i class="fa fa-download"></i> Export Excel</span>
      </a>
    </div>     
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
            <th class="px-4 py-3">Order Date</th>
            <th class="px-4 py-3">Order code</th>
            <th class="px-4 py-3">Customer name</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Total <br>amount</th>                     
            <th class="px-4 py-3">Payment type </th>
            {{-- <th class="px-4 py-3">View</th> --}}
          </tr>
        </thead>
        <tbody
        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
        >
        @foreach($orders as $order)
        <tr class="text-gray-700 dark:text-gray-400">
          <td class="px-4 py-3">
            <div class="flex items-center text-sm">                         
              <div>
               {{$order->created_at->format('d.m.Y H:i a')}}

             </div>
           </div>
         </td>
         <td class="px-4 py-3 text-sm">
          <a style="color:#6C2BD9" 
           href="{{url('orders-controller/view-order/'.$order->id) }}"> 
          {{$order->order_code}}</a>
        </td>                      
        <td class="px-4 py-3 text-xs parentstatus">  
         <p class="font-semibold">{{$order->username}}</p>
         <p class="text-xs text-gray-600 dark:text-gray-400">
          {{orderscount($order->id)}} Items
        </p>                                                                                                    
      </td>

      <td class="px-4 py-3 text-sm">
       {!!Form::select('status',$status,$order->status,['id'=>'status','class'=>'status form-control','data-id'=>$order->id])!!}  
     </td>
     <td class="px-4 py-3 text-sm">
      &#8377; {{$order->total}}
      </td><?php
      $type=[0=>'Credit card',1=>'Debit card',2=>'PayPal',3=>'COD'];
      ?>
      <td class="px-4 py-3 text-sm text-center">
        {{$type[$order->payment_type]}}
      </td>
      {{--<td class="px-4 py-3 text-sm">
         <a
         href="{{url('orders-controller/view-order/'.$order->id) }}"
                  class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  <i class="fa fa-eye"></i>
                </a>
                 
                
      </td>--}}
    </tr>
    @endforeach
  </div>
</main>
<style type="text/css">
  #status{
    width:150px;
    background-color: transparent;
  }
</style>
<script>
 $(document).on('change','.status',function(){  
  var value=$(this).val();  
  var id=$(this).attr('data-id')
    // alert(id);
  if(confirm('Do you want to change')){
   $.ajax({
    url:'orders-status-update',
    type:'POST',
    data:{
      orderid:id,
      status:value,
      _token:"{{csrf_token()}}"
    },
    success:function(response){
            // console.log(response.id);
    }
  })
 }
})
</script>
@endsection