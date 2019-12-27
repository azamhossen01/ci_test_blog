<?php $this->load->view('admin/admin_header.php'); ?>

<div class="container">
    <h1>Edit Article</h1>
    <form action="<?= base_url('admin_ctrl/edit/'.$article->id) ?>" method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input  type="text" name="title" value="<?= set_value('title',$article->title) ?>" class="form-control" id="title" placeholder="Title">
            <small class="text-danger"><?= form_error('title') ?></small>
        </div>
        <input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>">
        <div class="form-group">
            <label for="body">Body</label>
            <textarea  name="body" id="body" class="form-control" cols="30" rows="4"><?= set_value('body',$article->body) ?></textarea>
            <small class="text-danger"><?= form_error('body') ?></small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <!-- <input type="submit" name="submit" value="Submit" class="btn btn-primary"> -->
        <button type="reset" class="btn btn-danger">Cancel</button>
        <a href="<?= base_url('admin_ctrl/edit/'.$article->id) ?>" class="btn btn-success">Refresh</a>
    </form>
</div>


<?php $this->load->view('admin/admin_footer.php'); ?>