<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
      <li class="breadcrumb-item">User List</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">User List</h5>
          <a href="<?= base_url() ?>users/add" class="btn btn-primary float-end">Add New</a>
          <?php if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
          } ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if($users){
                  foreach($users as $u){
              ?>
                    <tr>
                      <td><?= $u->id ?></td>
                      <td><?= $u->name ?></td>
                      <td><?= $u->email_address ?></td>
                      <td><?= $u->contact_no ?></td>
                      <td>
                        <a href="<?= base_url() ?>users/edit/<?= $u->id ?>" class="btn btn-info">Edit</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= base_url() ?>users/delete/<?= $u->id ?>" class="btn btn-danger">Delete</a>
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