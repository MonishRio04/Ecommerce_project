    console.log($('.wish').text());

    $('.wish').click(function(){
        alert();
          $.ajax({
            url:"/add-wishlist/"+id,
            type:'GET',           
            success:function(response){
                console.log(response);
               
            },
                fail:function(){
                    console.log('failed');
                }
                });
      });