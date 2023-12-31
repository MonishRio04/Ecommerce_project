@extends('admin.layout.headerandfooter')
@section('admincontent')
        <main class="h-full pb-16 overflow-y-auto">
            <div class="container grid px-6 mx-auto">
              <div class="flex bg-green-200 p-4 mx-16 ">
              <div class="flex-1 bg-green-500 rounded-lg"><h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Product list</h4>
              </div>
              <form method="post" action="{{url('import-products')}}"  enctype="multipart/form-data" >
              <input type="file" name="file">
              @csrf
              <button style="margin: 10px;" 
             class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              <span><i class="fa fa-download"></i> import products</span></button>             
            </form>
          </div>    
              
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
                    <tr style="text-align:center" 
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                    <th class="px-4 py-3">S.no</th>
                      <th class="px-4 py-3">product</th>
                      <th class="px-4 py-3">Amount</th>
                      <th class="px-4 py-3">category</th>
                      <th class="px-4 py-3">Stock Quantity</th>
                      <th class="px-4 py-3">Delete</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    {{-- {{ dd($product->count()<=0) }} --}}
                    @if(($product->count()<=0))
                    <tr>
                        <td class="px-4 py-3 text-center" colspan="5">No Products</td>
                    </tr>
                  @endif
                  @foreach($product as $products)
                    <tr class="text-gray-700 dark:text-gray-400" style="text-align:center">
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="storage/productImages/{{ $products->image }}"
                              {{-- src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" --}}
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold">
                             <div class="flex items-center space-x-4 text-sm">
                            <a type="submit" id="editbtn" href="{{ route('products.edit',$products->id) }}"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit">                              
                            {{ $products->name }}</a>
                            </p>
                          </div>
                        </div>
                      </td>
                      @if($products->discount_price!=null)
                      <td class="px-4 py-3 text-sm">
                      <s>{{ $products->price }}</s><br>
                      {{ $products->discount_price }}
                    </td>
                    @else
                    <td class="px-4 py-3 text-sm">
                       {{ $products->price }}
                      </td>
                      @endif
                      <td class="px-4 py-3 text-xs">
                        {{$category[$products->category]}}
                     </td>
                      <td class="px-4 py-3 text-sm">
                        {{$products->stock_quantity}}
                       </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <a type="submit" id="editbtn" href="{{ route('products.edit',$products->id) }}"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit">
                                
                            </a>
                          <form method="post" action="{{ route('products.destroy',$products->id )}}">
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
