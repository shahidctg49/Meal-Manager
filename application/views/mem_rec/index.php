
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
      <li class="breadcrumb-item">All Meal List</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">All Meal</h5>
          <a href="<?= base_url() ?>mem_rec/add" class="btn btn-primary float-end">Add Meal</a>
          <?php if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
          } ?>
          <div class="row">
            <div class="col-3 offset-3">
              <div class="mb-3">
                <label for="date">Date:</label>
                <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control" id="mdate" name="mdate">
              </div>
            </div>
            <div class="col-3 mt-3 pt-2">
              <button type="button" onclick="memlist()" class="btn btn-primary">Show List</button>
            </div>
          </div>
          <div class="row">
            <div class="col-12" id="mem_data">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</main><!-- End #main -->

<script>
  function memlist(){
    let mdate=$('#mdate').val();
    $.ajax({
      dataType: "json",
      url: '<?= base_url("mem_rec/get_member_list") ?>',
      data: {mdate:mdate},
      success: function(d){
        $('#mem_data').html(d);
      }
    });
  }
</script>