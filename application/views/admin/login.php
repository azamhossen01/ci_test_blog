<?php $this->load->view('public/public_header'); ?>

<div class="container">
<?php 
if ($this->session->flashdata('error') != ''){ ?>
     <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
<?php } ?>




<h1 class="text-purple">Admin Login Form</h1>
<form action="<?= base_url('login_ctrl') ?>" method="post">
<div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" value="<?= set_value('email') ?>"  class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small class="text-danger"><?= form_error('email') ?></small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password"   name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      <small class="text-danger"><?= form_error('password') ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Cancel</button>
</form>
</div>

<?php $this->load->view('public/public_footer'); ?>