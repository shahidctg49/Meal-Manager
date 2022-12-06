
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
          <h5 class="card-title">Show Meals</h5>
          <a href="<?= base_url() ?>meal_exp/add" class="btn btn-primary float-end">Add Meal</a>
          <?php if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
          } ?>
          <div class="row">
            <div class="col-3">
              <div class="mb-3">
                <label for="mmonth">Month:</label>
                <select class="form-control" id="mmonth" name="mmonth">
                  <?php foreach(array_reduce(range(1,12),function($rslt,$m){ $rslt[$m] = date('F',mktime(0,0,0,$m,10)); return $rslt; }) as $n=>$m){ ?>
                  <option value="<?= $n ?>"> <?= $m ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-3">
              <div class="mb-3">
                <label for="date">Year:</label>
                <select class="form-control" id="myear" name="myear">
                  <?php for($i=2022; $i <= (date('Y')); $i++ ){ ?>
                  <option value="<?= $i ?>"> <?= $i ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-3">
              <div class="mb-3">
                <label for="id">Member:</label>
                <select name="member_id" id="member_id" class="form-control">
                  <option value="">Select member</option>
                  <?php if($members){
                          foreach($members as $m){  
                  ?>
                      <option value="<?= $m->id ?>"><?= $m->name ?> (<?= $m->contact ?>)</option>
                  <?php } } ?>
                </select>
              </div>
            </div>
            <div class="col-2 mt-3 pt-2">
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
    let mmonth=$('#mmonth').val();
    let myear=$('#myear').val();
    let member_id=$('#member_id').val();
    $.ajax({
      dataType: "json",
      url: '<?= base_url("meal_exp/get_meal_list") ?>',
      data: {mmonth:mmonth,myear:myear,member_id:member_id},
      success: function(d){
        $('#mem_data').html(d);
      }
    });
  }
  
</script>