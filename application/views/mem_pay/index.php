<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
      <li class="breadcrumb-item">Account List</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Account List</h5>
          <a href="<?= base_url() ?>mem_pay/add" class="btn btn-primary float-end">Add Deposit</a>
          <?php if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
          } ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Member</th>
                <th>Payment</th>
                <th>Expense</th>
                <th>Note</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $pay=$exp=0;
                if($mem_pay){
                  foreach($mem_pay as $u){
                    $pay+=$u->pay;
                    $exp+=$u->exp;
              ?>
                    <tr>
                      <td><?= $u->id ?></td>
                      <td><?= $u->pdate ?></td>
                      <td><?= $u->name ?></td>
                      <td><?= $u->pay ?></td>
                      <td><?= $u->exp ?></td>
                      <td><?= $u->note ?></td>
                      <td>
                        <a href="<?= base_url() ?>mem_pay/edit/<?= $u->id ?>" class="btn btn-info">Edit</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= base_url() ?>mem_pay/delete/<?= $u->id ?>" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                <?php } } ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="3" style="text-align:right">Total</th>
                <th><?= $pay ?></th>
                <th><?= $exp ?></th>
                <th>Balance</th>
                <th><?= $pay-$exp ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</main><!-- End #main -->