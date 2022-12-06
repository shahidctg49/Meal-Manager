<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
      <li class="breadcrumb-item">Member List</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Member List</h5>
          <a href="<?= base_url() ?>member_information/add" class="btn btn-primary float-end">Add New</a>
          <?php if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
          } ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Father Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if($member_information){
                  foreach($member_information as $u){
              ?>
                    <tr>
                      <td><?= $u->id ?></td>
                      <td><?= $u->name ?></td>
                      <td><?= $u->father_name ?></td>
                      <td><?= $u->contact ?></td>
                      <td><?= $u->address ?></td>
                      <td>
                        <a href="<?= base_url() ?>member_information/edit/<?= $u->id ?>" class="btn btn-info">Edit</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= base_url() ?>member_information/delete/<?= $u->id ?>" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                <?php } } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</main><!-- End #main -->