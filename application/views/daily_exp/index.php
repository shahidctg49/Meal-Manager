
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item">Shopping</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total Shopping</h5>
            <a href="<?= base_url() ?>daily_exp/add" class="btn btn-primary float-end">Add Shopping</a>
            <?php
              if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
              }
            ?>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Member Name</th>
                  <th>Note</th>
                  <th>Voucher</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if($daily_exp){
                    foreach($daily_exp as $u){
                ?>
                      <tr>
                        <td><?= $u->id ?></td>
                        <td><?= $u->expdate ?></td>
                        <td><?= $u->name ?></td>
                        <td><?= $u->note ?></td>
                        <td><a target="_blank" href="<?= base_url('upload/voucher/'.$u->uppic)  ?>"><img src="<?= base_url('upload/voucher/thumb/'.$u->uppic)  ?>" width="100px"></a></td>
                        <td><?= $u->amount ?></td>
                        <td>
                          <?php if(date('Y-m-d')== $u->expdate){ ?>
                          <a href="<?= base_url() ?>daily_exp/edit/<?= $u->id ?>" class="btn btn-info">Edit</a>
                          <a onclick="return confirm('Are you sure?')" href="<?= base_url() ?>daily_exp/delete/<?= $u->id ?>" class="btn btn-danger">Delete</a>
                          <?php } ?>
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