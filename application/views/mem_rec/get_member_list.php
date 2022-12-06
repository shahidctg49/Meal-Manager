<table class="table">
    <thead>
        <tr>
            <th>#SL</th>
            <th>Member Name</th>
            <th>Member contact</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Dinner</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $b=$l=$d=0; if($members){
            foreach($members as $i=>$mem){
                $b+=$mem->breakfast;
                $l+=$mem->lunch;
                $d+=$mem->dinner;
        ?>
            <tr>
                <th><?= ++$i ?></th>
                <th><?= $mem->name ?></th>
                <th><?= $mem->contact ?></th>
                <th><?= $mem->breakfast ?></th>
                <th><?= $mem->lunch ?></th>
                <th><?= $mem->dinner ?></th>
                <th>
                    <?php if(date('Y-m-d') == $mem->mdate) { ?>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#myModal" onclick="mem_set('<?= $mem->name ?>','<?= $mem->id ?>','<?= $mem->breakfast ?>','<?= $mem->lunch ?>','<?= $mem->dinner ?>')" class="btn btn-info"> <i class="tf-icons bx bx-exit"></i></button>
                    <?php } ?>
                </th>
            </tr>
        <?php }} ?>
    </tbody>
    <tfoot>
        <tr>
            <th style="text-align:right" colspan="3"> Total</th>
            <th> <?= $b ?></th>
            <th> <?= $l ?></th>
            <th> <?= $d ?></th>
        </tr>
    </tfoot>
</table>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?= form_open('mem_rec/update') ?>
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="mb-3 mt-3">
            <label for="breakfast">Breakfast:</label>
            <input type="text" id="breakfast" name="breakfast" value="" class="form-control">
            <input type="hidden" name="att_id" id="upattid">
        </div>
        <div class="mb-3 mt-3">
            <label for="lunch">Lunch:</label>
            <input type="text" id="lunch" name="lunch" value="" class="form-control">
        </div>
        <div class="mb-3 mt-3">
            <label for="dinner">Dinner:</label>
            <input type="text" id="dinner" name="dinner" value="" class="form-control">
        </div>
        <div class="mb-3 mt-3">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script>
    function mem_set(n,i,b,l,d){
        $('#breakfast').val(b);
        $('#lunch').val(l);
        $('#dinner').val(d);
        $('.modal-title').text('update data of '+n);
        $('#upattid').val(i);
    }
</script>