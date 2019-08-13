<div class="addproduct_form">
    <h3>Προσθήκη νέου προιόντος</h3>
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
        <label for="price" class="col-sm-2 col-form-label" >Τιμή</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="price" placeholder="Τιμή προιόντος"  step="0.01" min="0">
        </div>
    </div>
    <div class="form-group row">
        <label for="stock" class="col-sm-2 col-form-label">Ποσότητα</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="stock">
        </div>
    </div>
    <div class="form-group row">
        <label for="expires_at" class="col-sm-2 col-form-label">Ημερομηνία Λήξης</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" id="expires_at">
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
                <option value="darkred" >Σκούρο Κόκκινο</option>
                <option value="yellow" >Κίτρινο</option>
                <option value="orange" >Πορτοκαλί</option>
                <option value="gold" >Χρυσό</option>
                <option value="silver" >Ασημί</option>
                <option value="blue">Μπλε</option>
                <option value="darkblue">Σκούρο Μπλε</option>
                <option value="green" >Πράσινο</option>
                <option value="darkgreen" >Σκούρο Πράσινο</option>
            </select>
            <div id="color_box"></div>
        </div>
        <br> <br>
    <div class="form-group row">
        <p class="col-sm-2 col-form-label">Σημειώσεις</p>
        <div class="col-sm-10" >
            <textarea class="form-control" rows="4" cols="50" id="notes">
            </textarea>
        </div>
    </div>
    <input type="submit" class="btn btn-success" value="Προσθήκη!" style="margin-top: 130px;">
    </div>
</div>
</div>
<script>
        $('#color').change(function()
        {
            $('#color_box').css('background-color',$('#color').val());
        });
    </script>