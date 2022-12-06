<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Edit User</a></li>
        <li class="breadcrumb-item">Edit User</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container mt-3">
    <h2>Edit User</h2>
    <?php if($this->session->flashdata('msg')){
      echo $this->session->flashdata('msg');
    } ?>
    <?= form_open() ?>
      <div class="mb-3 mt-3">
        <label for="name">Full Name:</label>
        <input type="text" value="<?= set_value('name',$users->name); ?>" class="form-control" id="name" name="name">
        <span class="text-danger"><?= form_error('name'); ?></span>
      </div>
      <div class="mb-3 mt-3">
        <label for="email_address">Email:</label>
        <input type="email_address" value="<?= set_value('email_address',$users->email_address); ?>" class="form-control" id="email_address" name="email_address">
        <span class="text-danger"><?= form_error('email_address'); ?></span>
      </div>
      <div class="mb-3 mt-3">
        <label for="contact_no">Contact:</label>
        <input type="contact_no" value="<?= set_value('contact_no',$users->contact_no); ?>" class="form-control" id="contact_no" name="contact_no">
        <span class="text-danger"><?= form_error('contact_no'); ?></span>
      </div>
      <div class="mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password">
        <span class="text-danger"><?= form_error('password'); ?></span>
      </div>
      <div class="mb-3">
        <label for="cpwd">Confirm Password:</label>
        <input type="password" class="form-control" id="cpwd" name="cpassword">
        <span class="text-danger"><?= form_error('cpassword'); ?></span>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</main>