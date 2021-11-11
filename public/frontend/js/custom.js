//   function inc()
//   {
//     var inc_value = $('#qtyinput').val();
  
//     value = parseInt(inc_value, 10);
//     if(value<10)
//     {
//         value++;
//         $('#qtyinput').val(value);
        
//     }
//     console.log(value);
    
//   }
    
$(document).ready(function () {
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

    $(".addToCartBtn").click(function (e) {
        e.preventDefault();
        var product_id=$('#id').val();
        //var product_id = $(this).closest('Product_data').find('.prod_id').val(); 
        var product_qty =$('#qtyinput').val();
       
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: 
            {
                'product_id' :product_id,
                'product_qty' :product_qty,

            },
            success: function (response){

                swal(response.status);

            }
        }); 
    });

    $('.increment-btn').click(function (e) {
        e.preventDefault();

        // var inc_value = $('.qty-input').val();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            // console.log(value);
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }  
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        // var dec_value = $('.qty-input').val();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        } 
        // console.log(value); 
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

   $('.delete-cart-item').click(function (e) { 
       e.preventDefault();

       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

       var prod_id =  $(this).closest('.product_data').find('.prod_id').val();
       $.ajax({
           method:"POST",
           url:"delete-cart-item",
           data:{
               'prod_id': prod_id,
           },
           success: function (response) {
               window.location.reload();
               swal("",response.status,"success");
           }
       })
       
   });

   $('.changeQuantity').click(function (e) { 
       e.preventDefault();

       var prod_id =  $(this).closest('.product_data').find('.prod_id').val();
       var qty = $(".qty-input").val();
       console.log(qty);
       data = {
           'prod_id' : prod_id,
           'pro_qty' : qty,

       }
       $.ajax({
           method:"POST",
           url: "update_cart",
           data:data,
           success : function (response)
           {
               window.location.reload();
           }
           

       });
       
   });

});
