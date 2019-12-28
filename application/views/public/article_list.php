<?php include('public_header.php') ?>

<div class="container">
<div class="row">
  <div class="col-lg-12">
   <h1>Article List</h1>
    <a href="<?= base_url('admin_ctrl/create') ?>" class="btn btn-primary">Add New Article</a>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($data) : ?>
    <?php $count = $this->uri->segment(3,0) ?>
    <?php foreach($data as $key=>$row) : ?>
    <tr class="table-active">
      <th scope="row"><?= ++$count; ?></th>
      <td><?php $a = $this->article->anyName('users','id',$row->user_id,'name'); echo $a->name; ?></td>
      <td><?= $row->title; ?></td>
      <td><?= $row->body; ?></td>
      <td>
        <a href="<?= base_url('admin_ctrl/edit/'.$row->id); ?>" class="btn btn-warning btn-sm">Edit</a>
        <a onclick="return confirm('Are you sure?')" href="<?= base_url('admin_ctrl/delete/'.$row->id); ?>" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>

    <?php endforeach; ?>

    <?php else :  ?>
        <tr>
            <td colspan=4><h3>No Data</h3></td>
        </tr>
        
    <?php endif ; ?>
    </tbody>
    </table>

  <?= $this->pagination->create_links(); ?>
  </div>
</div>
   
</div>

<?php include('public_footer.php') ?>