<div class="main" style="width: 50%; margin-left: 25%;">
<div class="form-group row" >
    <label for="name" class="col-sm-2 col-form-label">Όνομα</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Όνομα προιόντος" required>
    </div>
</div>
<div class="form-group row">
    <label for="brand" class="col-sm-2 col-form-label">Εταιρία</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="brand" placeholder="Εταιρία προιόντος">
    </div>
</div>
<div class="form-group row">
    <label for="barcode" class="col-sm-2 col-form-label">BarCode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="barcode" placeholder="Barcode προιόντος">
    </div>
</div>
<div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label">Τιμή</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" placeholder="Τιμή προιόντος">
    </div>
</div>
<div class="form-group row">
    <label for="stock" class="col-sm-2 col-form-label">Ποσότητα</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="stock">
    </div>
</div>
<div class="form-group row">
    <label for="color" class="col-sm-2 col-form-label">Χρώμα</label>
    <div class="col-sm-10">
        <select class="form-control" id="color" style="display: inline-block; width: 50%;">
            <option value="unknown" >Αδιάφορο</option>
            <option value="black" >Μαύρο</option>
            <option value="gray" >Γκρι</option>
            <option value="white" >Άσπρο</option>
            <option value="red" >Κόκκινο</option>
            <option value="dark_red" >Σκούρο Κόκκινο</option>
            <option value="yellow" >Κίτρινο</option>
            <option value="orange" >Πορτοκαλί</option>
            <option value="gold" >Χρυσό</option>
            <option value="silver" >Ασημί</option>
            <option value="blue">Μπλε</option>
            <option value="dark_blue">Σκούρο Μπλε</option>
            <option value="green" >Πράσινο</option>
            <option value="dark_green" >Σκούρο Πράσινο</option>
        </select>
        <div id="color_box"></div>
    </div>
    <br> <br>
<div class="form-group row">
    <p class="col-sm-2 col-form-label">Σημειώσεις</p>
    <div class="col-sm-10" >
        <textarea class="form-control" rows="4" cols="50" id="notes" style="margin-left: 20%;">
        </textarea>
    </div>
</div>
<input type="button" class="btn btn-success" value="Προσθήκη!" style="margin-top: 130px;">
</div>
<script>
    $('#color').click(function()
    {
        $('#color_box').css('background-color',$('#color').val());
    });
</script>
</div>