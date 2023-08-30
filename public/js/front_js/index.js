  
$('.add-to-cart').click(function() {
    var parent = $(this).parents('.product-item');
    var quantity = parent.find('#quantity').val();
    var product_id = parent.find('#product_id').val();
    var customer_id = $('#customer_id').val();

    $.ajax({
        url: $('#cartlink').val(),
        type: 'POST',
        data: {
            'quantity': quantity,
            'product_id': product_id,
            'customer_id': customer_id,
            _token:  $('meta[name="_token"]').attr('content'),
        },
        success: function(response) {
                                                    // $("#trendingproducts").load(location.href + " #trendingproducts")
            parent.find('.add-to-cart').click(function(){
                window.location.href =$('#cartlink').val();
            }).html('<i>✔</i> view cart').css('color','green')
            .css('font-size','smaller');
                                                    // html('<i>✔</i> view cart').css('color','green')
                                                    // .css('font-size','smaller');

            $('#cartitemscount').text(response.length);
        },
        error:function(response){
            parent.find('#quantity').css('border','1px solid red')
        }
    });

});

  function addStock() {
    var inp = $('#quantity').val();
            var stockQuantity = $('#stockquantity').val();//$('#quantity').val();
            console.log(stockQuantity);
            if (stockQuantity != 0 && inp > stockQuantity) {
                $('#oos').text("*" + "Out off stock")
            } else {
                $('#oos').text('');
            }
        }

$('.wish').click(function(){
            // var id=$('.ids').val();
   var product_id = $(this).parents('.product-item').find('#product_id').val();
   $.ajax({
    url:"/add-wishlist/"+product_id,
    type:'GET',
    data:{
        _token:$('meta[name="_token"]').attr('content'),
    },  
    success:function(response){
        console.log('#btn'+response.id);
        var id='#btn'+response.id;
        if(response.status=='added')
            $(id).css('background-color','#F03838')
        .css('color','white');
        else{
            $(id).css('background-color','#fffff')
            .css('color','black');
        }                                                         
    },
    fail:function(){
        console.log('failed');
    }
});
});                                                
