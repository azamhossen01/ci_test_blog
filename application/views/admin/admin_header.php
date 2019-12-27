<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?= base_url('admin_ctrl') ?>"><?= $this->session->userdata('name'); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  <div class="collapse navbar-collapse" id="navbarColor01">

    <ul class="nav navbar-nav navbar-right">
      <li>
        <a class="nav-link" href="<?= base_url('admin_ctrl/logout') ?>">Logout</a>
      </li>
      
    </ul>
    
  </div>
</nav>
<?php 
if ($this->session->flashdata('success') != ''){ ?>
     <div class="alert alert-success alert-dismissible "><?= $this->session->flashdata('success'); ?></div>
<?php } ?>

<?php 
if ($this->session->flashdata('error') != ''){ ?>
     <div class="alert alert-danger alert-dismissible"><?= $this->session->flashdata('error'); ?></div>
<?php } ?>