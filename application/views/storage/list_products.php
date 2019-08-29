<div class="table_title">
  <h3 style="display: inline-block;"><?php echo $lang->line('products_list'); ?></h3>
  <a href="<?php echo base_url() ?>index.php/add_product">
    <button type="button" id="addproduct_btn" class="btn btn-warning"><?php echo $lang->line('add_product'); ?></button>
  </a>
</div>
<table class="table">
  <thead class="thead-themed" id='list_header'>
    <tr>
      <th scope="col">#</th>
      <th scope="col"><?php echo $lang->line('product_name'); ?></th>
      <th scope="col"><?php echo $lang->line('product_brand'); ?></th>
      <th scope="col"><?php echo $lang->line('product_color'); ?></th>
      <th scope="col"><?php echo $lang->line('product_size'); ?></th>
      <th scope="col"><?php echo $lang->line('product_price'); ?></th>
      <th scope="col"><?php echo $lang->line('product_stock'); ?></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($items as $item)
  {?>
    
    <tr>
      <th scope="row"><?php echo $item['id']?></th>
      <td><?php echo $item['name']?></td>
      <td><?php echo $item['brand']?></td>
      <td><?php echo $item['color']?></td>
      <td><?php echo $item['size']?></td>
      <td><?php echo $item['price']?></td>
      <td><?php echo $item['stock']?></td>
      <td>
        <form method="GET" action="<?php echo base_url('index.php/view_product')?>">
          <input type="hidden" name="id" value="<?php echo $item['id'];?>">
          <input class="btn btn-warning my-2 my-sm-0" type="submit" value="<?php echo $lang->line('view_product'); ?>" >
        </form>
        <form method="GET" action="<?php echo base_url('index.php/delete_product')?>">
          <input type="hidden" name="id" value="<?php echo $item['id'];?>">
          <input class="btn btn-outline-danger my-2 my-sm-0" type="submit" value="<?php echo $lang->line('delete_product'); ?>" >
        </form>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
</div>
</body>