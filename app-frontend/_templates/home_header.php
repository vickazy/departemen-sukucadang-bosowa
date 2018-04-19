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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Departemen Suku Cadang</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?=base_url();?>home">Home</a></li>
      <li><a href="<?=base_url();?>informasi">Informasi</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?=base_url();?>auth/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container text-center">
  <div class="row page-content>