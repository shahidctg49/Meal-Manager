<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Add Member</a></li>
      <li class="breadcrumb-item">Member List</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<body>
<div class="container mt-3">
  <h2>New Member</h2>
  <?php if($this->session->flashdata('msg')){
    echo $this->session->flashdata('msg');
  } ?>
  <?= form_open('member_information/store') ?>
    <div class="mb-3 mt-3">
      <label for="name">Full Name:</label>
      <input type="text" value="<?= set_value('name'); ?>" class="form-control" id="name" name="name">
      <span class="text-danger"><?= form_error('name'); ?></span>
    </div>

    <div class="mb-3 mt-3">
      <label for="father_name">Father Name:</label>
      <input type="text" value="<?= set_value('father_name'); ?>" class="form-control" id="father_name" name="father_name">
      <span class="text-danger"><?= form_error('father_name'); ?></span>
    </div>
    
    <div class="mb-3 mt-3">
      <label for="contact">Contact:</label>
      <input type="text" value="<?= set_value('contact'); ?>" class="form-control" id="contact" name="contact">
      <span class="text-danger"><?= form_error('contact'); ?></span>
    </div>

    <div class="mb-3 mt-3">
      <label for="address">Address:</label>
      <input type="address" value="<?= set_value('address'); ?>" class="form-control" id="address" name="address">
      <span class="text-danger"><?= form_error('address'); ?></span>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>