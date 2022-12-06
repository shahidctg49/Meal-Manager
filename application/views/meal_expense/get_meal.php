<div class="row">
    <div class="col-4">
        <table class="table">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Member Name</th>
                    <th>Meal</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalm=0; if($meal_info){
                    foreach($meal_info as $i=>$mem){
                        $totalm+=$mem->tmeal;
                ?>
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $mem->name ?></td>
                        <td><?= $mem->tmeal ?></td>
                    </tr>
                <?php }} ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Total</th>
                    <th><?= $totalm ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-4">
        <table class="table">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Member Name</th>
                    <th>Payment</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalp=0; if($pay_info){
                    foreach($pay_info as $i=>$mem){
                        $totalp+=$mem->pay;
                ?>
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $mem->name ?></td>
                        <td><?= $mem->pay ?></td>
                    </tr>
                <?php }} ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Total</th>
                    <th><?= $totalp ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-4">
        <h3>Meal Cost Details</h3>
        <table class="table">
            <tr>
                <th>Total Meal</th>
                <td><?= $totalm ?></td>
            </tr>
            <tr>
                <th>Total Cost</th>
                <td><?= $totalp ?></td>
            </tr>
            <tr>
                <th>Per Meal Cost</th>
                <td><?= $totalp>0?round($totalp /$totalm):0 ?></td>
            </tr>
        </table>
        <input type="text" name="mmonth" value="<?= $mmonth ?>">
        <input type="text" name="myear" value="<?= $myear ?>">
        <input type="text" name="mcost" value="<?= $totalp>0?round($totalp /$totalm):0 ?>">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
