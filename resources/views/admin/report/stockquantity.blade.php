@extends('admin.layout.headerandfooter')
@section('admincontent')
<style type="text/css">
.duration{
	  background: #fff;
	  border: 1px solid lightgrey;
	  border-radius:5px;
	  padding: 10px;
	  width: 150px;
	}
</style>
 <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">                       
            <!-- With avatar -->
          <div class="flex bg-green-200 p-4 mx-16 ">
		        <div class="flex-1 bg-green-500 rounded-lg"><h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Product Report</h4>
		        </div>	
            	
        	</div>        	
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap" id="table">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800" style="color:#7E3AF2"
                    >
                      <th class="px-4 py-3">S.no</th>
                      <th class="px-4 py-3">Product name</th>
                      {{-- <th class="px-4 py-3">Amount</th> --}}
                      <th class="px-4 py-3">Quantity</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="default"
                  >
                  {{-- @dd($products) --}}
                  <div id="rem">
                  @foreach($products as $product)
                    <tr class="text-gray-700 dark:text-gray-400 p-5 m-5">
                      <td class="px-6 py-3 text-sm">{{$loop->iteration}}
                      </td>
                      <td class="px-4 py-3 text-sm">{{$product->name}}
                      </td>
                       {{-- <td class="px-4 py-3 text-sm">{{$product->total}}
                      </td> --}}
                       <td class="px-4 py-3 text-sm">{{$product->stock_quantity}}
                      </td>                      
                    </tr>                    
                    @endforeach
                </div>
@endsection