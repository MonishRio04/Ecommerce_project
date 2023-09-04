@extends('admin.layout.headerandfooter')
@section('admincontent')
<style type="text/css">
 

div.online-indicator {
  display: inline-block;
  width: 10px;
  height: 10px;
  margin-right: 10px;
  
  background-color: #0fcc45;
  border-radius: 50%;
  
  position: relative;
}
span.blink {
  display: block;
  width: 12px;
  height: 12px;
  
  background-color: #0fcc45;
  opacity: 0.7;
  border-radius: 50%;
  
  animation: blink 1s linear infinite;
}
@keyframes blink {
  100% { transform: scale(2, 2); 
          opacity: 0;
        }
}
</style>

        <main class="h-full pb-16 overflow-y-auto">
            <div class="container grid px-6 mx-auto">
              <div class="flex bg-green-200 p-4 mx-16 ">
                <div class="flex-1 bg-green-500 rounded-lg"><h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Customers</h4>
                </div>                      
                <a style="margin: 10px;" href="{{route('customer.create')}}" 
               class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <span>Add new Customer</span></a>             
              </form>
            </div>
        @if(Session::has('dlt'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>!</strong> {{ Session::get('dlt') }}
          </div>
        @endif
                {{-- <button class="btn btn-success float-right" type="submit">Submit</button> --}}
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Image</th>
                      <th class="px-4 py-3">User Name</th>
                      <th class="px-4 py-3">Email</th>
                      <th class="px-4 py-3">Role</th>
                      <th class="px-4 py-3">joining date</th>
                      <th class="px-4 py-3">Address</th>
                      <th class="px-4 py-3">Delete</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- {{ dd($product->count()<=0) }} --}}
                    @if(($user->count()<=0))
                    <tr>
                        <td class="px-4 py-3 text-center" colspan="5">No Customers</td>
                    </tr>
                  @endif
                  @foreach($user as $users)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                           
                          @if($users->image!=null)
                          <img class="object-cover w-full h-full rounded-full" 
                            loading="lazy"
                            src=storage/customerImages/{{$users->image}}
                          />
                          @else
                          <img class="object-cover w-full h-full rounded-full" 
                            loading="lazy"
                            src={{url('images/profile.jpg')}}
                          />
                          <div
                            class="absolute inset-0 rounded-full shadow-inner"
                            aria-hidden="true"
                          ></div>
                        </div>
                          </div>
                        </td>
                          @endif
                          <td class="px-4 py-3"  >
                          <div style="display:flex">
                            <p class="font-semibold">
                               <a type="submit" id="editbtn" href="{{ route('customer.edit',$users->id) }}" 
                               class="text-purple-600"              
                                aria-label="Edit">
                             {{ $users->name}} </a>
                             
                              <div class="online-indicator" style="{{$users->isOnline()?'margin:6px':'background-color:red;'}}">
                              <span class="blink"style="{{$users->isOnline()?'':'background-color:red'}}"></span>
                            </div>
                             {{-- @endif               --}}
                            </p>
                          </div></td>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      {{ $users->email }}
                      {{-- </td> {{ var_dump($category->find($products->category\)) }} --}}
                      <td class="px-4 py-3 text-xs">
                       {{-- {{ dd($user_role::where($users->role)) }} --}}
                       {{ $user_role[$users->role] }}
                      </td>
                      <td class="px-4 py-3 text-sm">
                       {{date('d-m-Y',strtotime($users->created_at))}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <div>

                            <a href={{ route("address.index",["id"=>$users->id])}}
                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            <i class="fa fa-home"></i> Address
                            </a>
                          </div>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">                                                        
                          <form method="post" action="{{ route('customer.destroy',$users->id )}}">
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

            </div>
          </div>
        </main>

@endsection
