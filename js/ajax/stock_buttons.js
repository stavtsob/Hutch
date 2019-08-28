var base_url = document.getElementById('ajax_stock_buttons').getAttribute('data-base_url');

$("#increase_btn").click(function(){


    var quantity = $("#quantity").val();
    var id = $("#id").val();
     $.ajax({
        url: base_url + 'index.php/ajax_item_increase',
        type: 'POST',
        data: {id: id, quantity: quantity},
        error: function() {
           alert('Κάτι πήγε λάθος.');
        },
        success: function(data) {
         if(data == 'ERROR 500')
             {
                 alert('Something went wrong.');
             }
         else
         {
             var item = JSON.parse(data);
             if(quantity < 0)
             {
                 quantity = quantity*(-1);
             }
             var message = quantity+" product added to stock.";
             $('#stock').attr('value', item.stock);
             addNotification(message);
         }
        }
     });


 });
 $("#decrease_btn").click(function(){
     var quantity = $("#quantity").val();
     var id = $("#id").val();
     $.ajax({
         url: base_url + 'index.php/ajax_item_decrease',
         type: 'POST',
         data: {id: id, quantity: quantity},
         error: function() {
         alert('Κάτι πήγε λάθος.');
         },
         success: function(data) {
             if(data == 'ERROR 500')
             {
                 alert('Something went wrong. Please check for invalid values in stock input.');
             }
             else
             {   
                 var item = JSON.parse(data);
                 if(quantity < 0)
                 {
                     quantity = quantity*(-1);
                 }
                 var message =quantity+" product removed from stock.";
                 $('#stock').attr('value', item.stock);
                 addNotification(message);
             }
         }
     });


     });