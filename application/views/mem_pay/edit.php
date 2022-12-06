<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Payment</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Edit Payment</a></li>
        <li class="breadcrumb-item">Edit Payment</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container mt-3">
    <h2>Edit Deposit</h2>
    <?php if($this->session->flashdata('msg')){
      echo $this->session->flashdata('msg');
    } ?>
    <?= form_open() ?>
    <div class="row">
      <div class="col-6">
        <div class="mb-3 mt-3">
          <label for="id">Member:</label>
          <select name="member_id" id="" class="form-control">
            <option value="">Select member</option>
            <?php 
              if($members){
                foreach($members as $m){  
            ?>
                <option <?= set_value('member_id',$mem_pay->member_id)==$m->id?"selected":""; ?> value="<?= $m->id ?>"><?= $m->name ?> (<?= $m->contact ?>)</option>
            <?php } } ?>
          </select>
          <span class="text-danger"><?= form_error('member_id'); ?></span>
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3 mt-3">
          <label for="pdate">Date:</label>
          <input type="date" value="<?= set_value('pdate',$mem_pay->pdate); ?>" class="form-control" id="pdate" name="pdate">
          <span class="text-danger"><?= form_error('pdate'); ?></span>
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <label for="amount">Amount:</label>
          <input type="text" value="<?= set_value('amount',$mem_pay->pay>0?$mem_pay->pay:$mem_pay->exp); ?>" class="form-control" id="amount" name="amount">
          <span class="text-danger"><?= form_error('amount'); ?></span>
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <label for="type">Type:</label>
          <select class="form-control" id="type" name="type">
            <option value="pay" <?= set_value('type',$mem_pay->pay>0?"pay":"exp")=="pay"?"selected":""; ?>>Payment</option>
            <option value="exp" <?= set_value('type',$mem_pay->pay>0?"pay":"exp")=="exp"?"selected":""; ?>>Expense</option>
          </select>
          <span class="text-danger"><?= form_error('type'); ?></span>
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3 mt-3">
          <label for="note">Note:</label>
          <textarea class="form-control" id="note" name="note"><?= set_value('note'); ?></textarea>
        </div>
      </div>
    </div>

      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</main>