<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Meal</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Edit Meal</a></li>
        <li class="breadcrumb-item">Edit Meal</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container mt-3">
    <h2>Edit Meal</h2>
    <?php if($this->session->flashdata('msg')){
      echo $this->session->flashdata('msg');
    } ?>
    <?= form_open() ?>
      <div class="mb-3 mt-3">
        <label for="id">ID:</label>
        <input type="text" value="<?= set_value('id',$mem_rec->id); ?>" class="form-control" id="id" name="id">
        <span class="text-danger"><?= form_error('id'); ?></span>
      </div>

      <div class="mb-3 mt-3">
        <label for="date">Date:</label>
        <input type="text" value="<?= set_value('date',$mem_rec->date); ?>" class="form-control" id="date" name="date">
        <span class="text-danger"><?= form_error('date'); ?></span>
      </div>

      <div class="mb-3 mt-3">
        <label for="morning">Morning:</label>
        <input type="text" value="<?= set_value('morning',$mem_rec->morning); ?>" class="form-control" id="morning" name="morning">
        <span class="text-danger"><?= form_error('morning'); ?></span>
      </div>

      <div class="mb-3 mt-3">
        <label for="lunch">Lunch:</label>
        <input type="text" value="<?= set_value('lunch',$mem_rec->lunch); ?>" class="form-control" id="lunch" name="lunch">
        <span class="text-danger"><?= form_error('lunch'); ?></span>
      </div>

      <div class="mb-3 mt-3">
        <label for="dinner">Dinner:</label>
        <input type="text" value="<?= set_value('dinner',$mem_rec->dinner); ?>" class="form-control" id="dinner" name="dinner">
        <span class="text-danger"><?= form_error('dinner'); ?></span>
      </div>        
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</main>