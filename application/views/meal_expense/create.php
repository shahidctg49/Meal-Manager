<main id="main" class="main">

<div class="pagetitle">
  <h1>Monthley Meal Status</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Add Meals</a></li>
      <li class="breadcrumb-item">Monthley Meal Status</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

  <div class="container mt-3">
    <?php if($this->session->flashdata('msg')){
      echo $this->session->flashdata('msg');
    } ?>
    
    <div class="row">
      <div class="col-3 offset-1">
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
      <div class="col-3 mt-3 pt-2">
        <button type="button" onclick="meallist()" class="btn btn-primary">Get Member</button>
      </div>
    </div>
    
  <?= form_open('meal_exp/store') ?>  
    <div class="row">
      <div class="col-12" id="mem_data">

      </div>
    </div>
  </form>

  </div>
</main>


<script>
  function meallist(){
    let mmonth=$('#mmonth').val();
    let myear=$('#myear').val();
    $.ajax({
      dataType: "json",
      url: '<?= base_url("meal_exp/get_meal") ?>',
      data: {mmonth:mmonth,myear:myear},
      success: function(d){
        $('#mem_data').html(d);
      }
    });
  }
  
</script>