<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=$title;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url();?>app-assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?=base_url();?>app-assets/css/jquery-ui.css">
  <link rel="stylesheet" href="<?=base_url();?>app-assets/css/styles.css">
  <link rel="stylesheet" href="<?=base_url();?>app-assets/css/font-awesome.min.css">
  <script src="<?=base_url();?>app-assets/js/jquery.min.js"></script>
  <script src="<?=base_url();?>app-assets/js/bootstrap.js"></script>
</head>
<body>

<?php
if(!isset($showNavbar)){
    $showNavbar = true;
}

if($showNavbar) {
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" d`ata-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Departemen Suku Cadang</a>
    </div>

    <?php if($this->auth_model->isLogin(false)) { ?>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
    <?php } else { ?>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=site_url();?>auth/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
    <?php }?>
  </div>
</nav>
<?php
}
?>
  
<div class="container-fluid text-center">
<?php
if (!isset($loginPage)) {
  $loginPage = false;
}
if($loginPage){
?>
  <div class="row login-content content">
<?php
} else {
?>
  <div class="row page-content content">
<?php
} 
?>  
