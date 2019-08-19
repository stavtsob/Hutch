<div class="addproduct_form">
<?php echo validation_errors(); ?>
    <h3><?php echo $lang->line('add_product'); ?></h3>
    <form method="POST" action="<?php echo base_url('index.php/add_product_request');?>">
    <div class="form-group row" >
        <label for="name" class="col-sm-2 col-form-label"><?php echo $lang->line('product_name'); ?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $lang->line('product_name'); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="brand" class="col-sm-2 col-form-label"><?php echo $lang->line('product_brand'); ?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="brand" name="brand" placeholder="<?php echo $lang->line('product_brand'); ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="barcode" class="col-sm-2 col-form-label"><?php echo $lang->line('product_barcode'); ?></label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="barcode" name="barcode" placeholder="<?php echo $lang->line('product_barcode'); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label" ><?php echo $lang->line('product_price'); ?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="price" name="price" placeholder="<?php echo $lang->line('product_price'); ?>"  step="0.01" min="0" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="stock" class="col-sm-2 col-form-label"><?php echo $lang->line('product_stock'); ?></label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="stock" name="stock" min="0" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="expires_at" class="col-sm-2 col-form-label"><?php echo $lang->line('product_expiration'); ?></label>
        <div class="col-sm-10">
        <input type="date" class="form-control" id="expires_at" name="expires_at">
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
    <input type="submit" class="btn btn-success" value="<?php echo $lang->line('add'); ?>" style="margin-top: 130px;">
    </div>
</form>
</div>
</div>
<script>
        $('#color').change(function()
        {
            $('#color_box').css('background-color',$('#color').val());
        });
    </script>