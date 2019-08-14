<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<title><?php echo $app_name;?> - Warehouse Management System</title>
</head>
<body>
<div class="main">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $app_name;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
         <a class="nav-link" href="<?php echo base_url() ?>index.php/">Αποθήκη <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Ιστορικό</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Αποσύνδεση</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="GET" action="<?php echo base_url('index.php/view_product')?>">
      <input name="barcode" class="form-control mr-sm-2" type="search" placeholder="Γράψε το Barcode">
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Ψάξε!" >
    </form>
  </div>
  </nav>
  <!-- SHOW NOTIFICATIONS !-->
  <?php if(isset($notification)){ ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?php echo $notification;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div><?php } ?>
  <!-- SHOW ERRORS !-->
  <?php if(isset($error)){ ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <?php echo $error;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div><?php } ?>
  
