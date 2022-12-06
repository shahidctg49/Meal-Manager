<main id="main" class="main">
  <div class="pagetitle">
    <h1>Shopping</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Shopping</a></li>
        <li class="breadcrumb-item">Shopping</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container mt-3">
    <h2>Edit Shopping</h2>
    <?php if($this->session->flashdata('msg')){
      echo $this->session->flashdata('msg');
    } ?>
    <?= form_open_multipart() ?>
    <div class="mb-3 mt-3">
      <label for="id">Member:</label>
      <select name="member_id" id="" class="form-control">
        <option value="">select member</option>
        <?php if($members){
                foreach($members as $m){  
        ?>
            <option <?= set_value('member_id',$daily_exp->member_id)==$m->id?"selected":""; ?> value="<?= $m->id ?>"><?= $m->name ?> (<?= $m->contact ?>)</option>
        <?php } } ?>
      </select>
      <span class="text-danger"><?= form_error('member_id'); ?></span>
    </div>

    <div class="mb-3 mt-3">
      <label for="expdate">Date:</label>
      <input type="date" value="<?= set_value('expdate',$daily_exp->expdate); ?>" class="form-control" id="expdate" name="expdate">
      <span class="text-danger"><?= form_error('expdate'); ?></span>
    </div>

    <div class="mb-3 mt-3">
      <label for="note">Mote:</label>
      <textarea class="form-control" id="note" name="note"><?= set_value('note',$daily_exp->note); ?></textarea>
      <span class="text-danger"><?= form_error('note'); ?></span>
    </div>

    <div class="mb-3 mt-3">
      <label for="uppic">Voucher Photo:</label>
      <input type="file" value="<?= set_value('uppic'); ?>" class="form-control" id="uppic" name="uppic">
      <span class="text-danger"><?= form_error('uppic'); ?></span>
    </div>

    <div class="mb-3 mt-3">
      <label for="amount">Amount:</label>
      <input type="text" value="<?= set_value('amount',$daily_exp->amount); ?>" class="form-control" id="amount" name="amount">
      <span class="text-danger"><?= form_error('amount'); ?></span>
    </div> 
        
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</main>