<div id="notifications">
    <div id="notif" class="alert alert-warning alert-dismissible fade show" role="alert" style='display: none; margin-bottom: 0px;'>
    <span id="notif_text"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
</div>
<div class="addproduct_form">
<?php echo validation_errors(); ?>
    <h3><?php echo $lang->line('change_product_stock'); ?></h3>
    <div class="form-group row">
        <label for="stock" class="col-sm-2 col-form-label"><?php echo $lang->line('product_stock'); ?></label>
        <div class="col-sm-10" >
            <input type="number" class="form-control" id="quantity" name="stock" min="0" value=1  style="display: inline-block;width: 100px;margin-right:25px;" required>
            <button type="button" id="increase_btn" class="btn btn-success round-btn" >+</button>
            <button type="button" id="decrease_btn" class="btn btn-danger round-btn">-</button>
        </div>
        <div style="display: inline-block;">
            
        </div>
    </div>
    <h3><?php echo $lang->line('edit_product'); ?></h3>
    <form method="POST" action="">
    <div class="form-group row" >
        <label for="name" class="col-sm-2 col-form-label"><?php echo $lang->line('product_name'); ?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $item['name']; ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="brand" class="col-sm-2 col-form-label"><?php echo $lang->line('product_brand'); ?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $item['brand']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="barcode" class="col-sm-2 col-form-label"><?php echo $lang->line('product_barcode'); ?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="barcode" name="barcode" value="<?php echo $item['barcode']; ?>" required disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label" ><?php echo $lang->line('product_price'); ?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="price" name="price" value="<?php echo $item['price']; ?>"  step="0.01" min="0" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="stock" class="col-sm-2 col-form-label"><?php echo $lang->line('product_stock'); ?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="stock" name="stock" min="0" value=<?php echo $item['stock']; ?> required>
        </div>
    </div>
    <div class="form-group row">
        <label for="expires_at" class="col-sm-2 col-form-label"><?php echo $lang->line('product_expiration'); ?></label>
        <div class="col-sm-10">
        <input type="date" class="form-control" id="expires_at" name="expires_at" value="<?php echo $item['expires_at']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="color" class="col-sm-2 col-form-label"><?php echo $lang->line('product_color'); ?></label>
        <div class="col-sm-10">
            <select class="form-control" id="color" name="color"  style="display: inline-block; width: 50%;">
                <option value="unknown" ><?php echo $lang->line('unknown'); ?></option>
                <option value="black" ><?php echo $lang->line('black'); ?></option>
                <option value="gray" ><?php echo $lang->line('gray'); ?></option>
                <option value="white" ><?php echo $lang->line('white'); ?></option>
                <option value="red" ><?php echo $lang->line('red'); ?></option>
                <option value="darkred" ><?php echo $lang->line('darkred'); ?></option>
                <option value="yellow" ><?php echo $lang->line('yellow'); ?></option>
                <option value="orange" ><?php echo $lang->line('orange'); ?></option>
                <option value="gold" ><?php echo $lang->line('gold'); ?></option>
                <option value="silver" ><?php echo $lang->line('silver'); ?></option>
                <option value="blue"><?php echo $lang->line('blue'); ?></option>
                <option value="darkblue"><?php echo $lang->line('darkblue'); ?></option>
                <option value="green" ><?php echo $lang->line('green'); ?></option>
                <option value="darkgreen" ><?php echo $lang->line('darkgreen'); ?></option>
            </select>
            <div id="color_box"></div>
        </div>
        <br> <br>
    <div class="form-group row">
        <p class="col-sm-2 col-form-label"><?php echo $lang->line('product_notes'); ?></p>
        <div class="col-sm-10" >
            <textarea class="form-control" rows="4" cols="50" id="notes" name="notes">
            </textarea>
        </div>
    </div>
    </div>
</form>
</div>
</div>
<script>
        $("#color").val("<?php echo $item['color'];?>")
        $('#color').change(function()
        {
            $('#color_box').css('background-color',$('#color').val());
        });
</script>
<script type="text/javascript">
    var notification_count=0;
    $("#increase_btn").click(function(){


       var quantity = $("#quantity").val();
       var barcode = $("#barcode").val();
        $.ajax({
           url: '<?php echo base_url('index.php/ajax_item_increase');?>',
           type: 'POST',
           data: {barcode: barcode, quantity: quantity},
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
                var notif = document.getElementById("notif");
                var new_notif = notif.cloneNode(true);
                notification_count++;
                new_notif.setAttribute("id", "notif_"+notification_count)
                var item = JSON.parse(data);
                new_notif.childNodes[0].textContent=quantity+"<?php echo $lang->line('add_to_stock'); ?>";
                document.getElementById("notifications").appendChild(new_notif);
                $('#stock').attr('value', item.stock);
                $('#notif_'+notification_count).show();
                if(quantity < 0)
                {
                    quantity = quantity*(-1);
                }
            }
           }
        });


    });
    $("#decrease_btn").click(function(){
        var quantity = $("#quantity").val();
        var barcode = $("#barcode").val();
        $.ajax({
            url: '<?php echo base_url('index.php/ajax_item_decrease');?>',
            type: 'POST',
            data: {barcode: barcode, quantity: quantity},
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
                    var notif = document.getElementById("notif");
                    var new_notif = notif.cloneNode(true);
                    notification_count++;
                    new_notif.setAttribute("id", "notif_"+notification_count)
                    var item = JSON.parse(data);
                    new_notif.childNodes[0].textContent=quantity+"<?php echo $lang->line('remove_from_stock'); ?>";
                    document.getElementById("notifications").appendChild(new_notif);
                    $('#stock').attr('value', item.stock);
                    $('#notif_'+notification_count).show();
                    if(quantity < 0)
                    {
                        quantity = quantity*(-1);
                    }
                    
                }
            }
        });


        });


</script>