@extends('admin.layout.headerandfooter')
@section('admincontent')
    <script src="{{ asset('js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('js/charts-bars.js') }}" defer></script>
<main class="h-full overflow-y-auto">
            <div class="container px-6 grid">
                 <div class="flex bg-green-200 p-4 mx-16 ">
                        <div class="flex-1 bg-green-500 rounded-lg"><h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600            dark:text-gray-300"> Dashboard</h4>
                        </div>                        
                         <a class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow h-fit" style="height:fit-content" href="{{url('signout')}}" >Log off</a>
                </div>
                <div class="grid mt-2 gap-6 mb-2 md:grid-cols-2 xl:grid-cols-4">
                    <!-- Card -->
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <a href="{{url('customer')}}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg></a>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-bold text-gray-600 dark:text-gray-400">
                                Total Customers
                            </p>
                            <div style="display:flex">
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{$totalcustomers}}                                                    
                            </p>&nbsp;
                             <p class="text-sm mt-1 font-medium text-gray-600 dark:text-gray-400">
                                    Customers
                            </p>  
                        </div>
                        </div>
                    </div>
                   
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                            <a href="{{url('orders-controller')}}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                </path>
                            </svg>
                        </a>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-bold text-gray-600 dark:text-gray-400">
                                Total Orders
                            </p>
                            <div style="display:flex">
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{$totalorders}}</p> &nbsp;
                            <p class="text-sm mt-1 font-medium text-gray-600 dark:text-gray-400">
                                    Orders
                            </p>
                        </div>
                        </div>
                    </div>
                
                </div>

                <!-- Charts -->
                <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                    Charts
                </h2>
                <div class="grid gap-6 md:grid-cols-1">                    

                        {{-- line chart --}}

                    <div class="min-w-0 p-4 mb-8 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="height:90%">
                        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                           Order Traffic
                        </h4>
                        {{-- {{dd($barchart)}} --}}
                        <input type="hidden" value="{{$days}}" id="days">
                        <input type="hidden" value="{{json_encode($chart)}}" id="chartvalue">
                        <input type="hidden" value="{{json_encode($barchart)}}" id="barchart">
                        <input type="hidden" value="{{json_encode($orderbarchart)}}" id="orderbar">
                        <canvas id="line"></canvas>
                        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                            <!-- Chart legend -->
                            <div class="flex items-center">
                                <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                                <span>Order Growth</span>
                            </div>
                          {{--   <div class="flex items-center">
                                <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                                <span>Paid</span>
                            </div> --}}
                        </div>
                    </div>
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Customer chart </h4>
                        <canvas id="bars"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-green-500 rounded-full" style="background-color:#3c763d"></span>
                    <span>Customer growth in this year</span>
                </div>
               {{--  <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                    <span>Bags</span>
                </div> --}}
                </div>
                 </div>
                 <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Orders chart</h4>
                        <canvas id="orderbarchart"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-500 rounded-full" style="background-color:#ff5a1f"></span>
                    <span>Order growth in this year</span>
                </div>
               {{--  <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                    <span>Bags</span>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>
@endsection
