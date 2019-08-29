<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url('js/notifications.js');?>" ></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<title><?php echo $app_name;?> - Warehouse Management System</title>
</head>
<body>
<!-- SHOW NOTIFICATIONS -->
<div id="notifications">
    <div id="notif" class="alert alert-warning alert-dismissible fade show" role="alert" style='display: none; margin-bottom: 0px;'>
    <span id="notif_text"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
</div>
<div class="main">
<nav class="navbar navbar-expand-lg navbar-themed">
  <a class="navbar-brand" href="#"><?php echo $app_name;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
         <a class="nav-link" href="<?php echo base_url() ?>index.php/"><?php echo $lang->line('warehouse'); ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo $lang->line('history'); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo $lang->line('logout'); ?></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="GET" action="<?php echo base_url('index.php/view_product')?>">
      <input name="barcode" class="form-control mr-sm-2" type="search" placeholder="<?php echo $lang->line('search_placeholder'); ?>">
      <input class="btn btn-light my-2 my-sm-0" type="submit" value="<?php echo $lang->line('search_button'); ?>" >
    </form>
  </div>
  </nav>
  <!-- SHOW ERRORS !-->
  <?php if(isset($error)){ ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?php echo $error;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div><?php } ?>
  
<?php
if(isset($notification))
{
  echo '<script>';
  echo 'addNotification("'.$notification.'");';
  echo '</script>';
}
?>
  
