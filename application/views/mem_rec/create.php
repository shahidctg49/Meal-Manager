<main id="main" class="main">

<div class="pagetitle">
  <h1>Daily Account List</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Add Meal</a></li>
      <li class="breadcrumb-item">Daily Account List</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

  <div class="container mt-3">
    <?php if($this->session->flashdata('msg')){
      echo $this->session->flashdata('msg');
    } ?>
    <?= form_open('mem_rec/store') ?>
    <div class="row">
      <div class="col-3 offset-3">
        <div class="mb-3">
          <label for="date">Date:</label>
          <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control" id="mdate" name="mdate">
        </div>
      </div>
      <div class="col-3 mt-3 pt-2">
        <button type="button" onclick="memlist()" class="btn btn-primary">Get Member</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12" id="mem_data">
      </div>
    </div>     
    </form>
  </div>
</main>

<script>
  function memlist(){
    let mdate=$('#mdate').val();
    $.ajax({
      dataType: "json",
      url: '<?= base_url("mem_rec/get_member") ?>',
      data: {mdate:mdate},
      success: function(d){
        $('#mem_data').html(d);
      }
    });
  }
</script>