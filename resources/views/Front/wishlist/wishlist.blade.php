@extends('Front.layout.navbarandfooter')
@section('main')
 @include('Front.layout.usersidebar')
 <div class="col py-3">
            <h3 class="d-inline p-2 text-dark">Wishlists 
            	</h3>
            	<input type="hidden" id="count" value="{{count($items)}}">
            <button onclick="history.back()" class="d-inline btn text-decoration-none p-2" style="float:right">
               <i class="fa fa-angle-double-left"></i> Back</button>
    <div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr class="text-center">		     		      
		      <th scope="col"></th>
		      <th scope="col">Name</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>		  
		  	@foreach($items as $item)
		    <tr class="text-center"id="hide{{$item->id}}">		      
		      <td class="w-25" style="vertical-align: middle">
		      	<a href="{{url('/product/'.$item->slug )}}">
			      <img src="{{ asset('storage/productImages/'.$item->pimage) }}" 
			      class="img-fluid img-thumbnail w-50 h-50" alt="Sheep"></a>
		      </td>
		      <td class="text-right" style="vertical-align: middle;">
		     {{ $item->pname }}<br>
		      <sub style="color:green"> &#8377;{{$item->product_price}}</sub>
		  </td>
		      <td class="text-right" style="vertical-align: middle;">
		      	<button type="button" 
		      	 class="delete btn" >
		      	{{--href="{{url('wishlist-delete/'.$item->id)}}">	--}}
		      	{{Form::hidden('wishid',$item->id,['id'=>'wishid'])}}
		      	<i class="fa fa-trash-o"></i>
		      	</a>
		      </td>
		    </tr>	
		    
		    @endforeach
		    <script>
		    	$('.delete').click(function(){
		    		var id=$(this).parents('.text-right').find('#wishid').val();
		    		$.ajax({
		    			url:'wishlist-delete/'+id,
		    			type:"GET",
		    			success:function(response){
		    				var id='#hide'+response.id;
		    				$(id).slideUp();		    				
		    			}
		    		})
		    	});

		    </script>

		  </tbody>
		</table>   
    </div>
</div>
<!--  -->
</div>
</div>
@endsection
