var notification_count=0;
    $("#increase_btn").click(function(){


       var quantity = $("#quantity").val();
       var id = $("#id").val();
        $.ajax({
           url: '<?php echo base_url('index.php/ajax_item_increase');?>',
           type: 'POST',
           data: {id: id, quantity: quantity},
           error: function() {
              alert('Κάτι πήγε λάθος.');
           },
           success: function(data) {
            if(data == 'ERROR 500')
                {
                    alert('Κάτι πήγε λάθος. Παρακαλώ να ελέγξετε αν η ποσότητα που θέλετε να αφαιρέσετε είναι μικρότερη η ίση από το υπάρχων απόθεμα.');
                }
            else
            {
                var item = JSON.parse(data);
                if(quantity < 0)
                {
                    quantity = quantity*(-1);
                }
                var message = quantity+"<?php echo $lang->line('add_to_stock'); ?>";
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
            url: '<?php echo base_url('index.php/ajax_item_decrease');?>',
            type: 'POST',
            data: {id: id, quantity: quantity},
            error: function() {
            alert('Κάτι πήγε λάθος.');
            },
            success: function(data) {
                if(data == 'ERROR 500')
                {
                    alert('Κάτι πήγε λάθος. Παρακαλώ να ελέγξετε αν η ποσότητα που θέλετε να αφαιρέσετε είναι μικρότερη η ίση από το υπάρχων απόθεμα.');
                }
                else
                {   
                    var item = JSON.parse(data);
                    if(quantity < 0)
                    {
                        quantity = quantity*(-1);
                    }
                    var message =quantity+"<?php echo $lang->line('remove_from_stock'); ?>";
                    $('#stock').attr('value', item.stock);
                    addNotification(message);
                }
            }
        });


        });
    function addNotification($text)
    {
        var notif = document.getElementById("notif");
        var new_notif = notif.cloneNode(true);
        notification_count++;
        new_notif.setAttribute("id", "notif_"+notification_count);
        new_notif.childNodes[0].textContent= $text;
        document.getElementById("notifications").appendChild(new_notif);
        $('#notif_'+notification_count).show();
        var count = notification_count;
        setTimeout(function()
        {
            $('#notif_'+count).hide();
        }, 3000);
    }