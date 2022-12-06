<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Member</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Edit Member</a></li>
        <li class="breadcrumb-item">Edit Member</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container mt-3">
    <h2>Edit Member</h2>
    <?php if($this->session->flashdata('msg')){
      echo $this->session->flashdata('msg');
    } ?>
    <?= form_open() ?>
      <div class="mb-3 mt-3">
        <label for="name">Full Name:</label>
        <input type="text" value="<?= set_value('name',$member_information->name); ?>" class="form-control" id="name" name="name">
        <span class="text-danger"><?= form_error('name'); ?></span>
      </div>
      <div class="mb-3 mt-3">
        <label for="father_name">Father Name:</label>
        <input type="text" value="<?= set_value('father_name',$member_information->father_name); ?>" class="form-control" id="father_name" name="father_name">
        <span class="text-danger"><?= form_error('father_name'); ?></span>
      </div>
      
      <div class="mb-3 mt-3">
        <label for="contact">Contact:</label>
        <input type="text" value="<?= set_value('contact',$member_information->contact); ?>" class="form-control" id="contact" name="contact">
        <span class="text-danger"><?= form_error('contact'); ?></span>
      </div>

      <div class="mb-3 mt-3">
        <label for="address">Address:</label>
        <input type="text" value="<?= set_value('address',$member_information->address); ?>" class="form-control" id="address" name="address">
        <span class="text-danger"><?= form_error('address'); ?></span>
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</main>