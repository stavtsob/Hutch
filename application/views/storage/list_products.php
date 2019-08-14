<div class="table_title">
  <h3 style="display: inline-block;">Λίστα προιόντων στην αποθήκη</h3>
  <a href="<?php echo base_url() ?>index.php/add_product">
    <button type="button" id="addproduct_btn" class="btn btn-success">Προσθήκη προιόντος</button>
  </a>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Barcode</th>
      <th scope="col">Όνομα Προιόντος</th>
      <th scope="col">Εταιρία</th>
      <th scope="col">Χρώμα</th>
      <th scope="col">Μέγεθος</th>
      <th scope="col">Τιμή</th>
      <th scope="col">Ποσότητα</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($items as $item)
  {?>
    
    <tr>
      <th scope="row"><?php echo $item['id']?></th>
      <td><?php echo $item['barcode']?></td>
      <td><?php echo $item['name']?></td>
      <td><?php echo $item['brand']?></td>
      <td><?php echo $item['color']?></td>
      <td><?php echo $item['size']?></td>
      <td><?php echo $item['price']?></td>
      <td><?php echo $item['stock']?></td>
      <td>
        <form method="GET" action="<?php echo base_url('index.php/view_product')?>">
          <input type="hidden" name="barcode" value="<?php echo $item['barcode'];?>">
          <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Προβολή" >
        </form>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
</body>