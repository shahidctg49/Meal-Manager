<table class="table">
    <thead>
        <tr>
            <th>#SL</th>
            <th>Date</th>
            <th>Note</th>
            <th>Payment</th>
            <th>Cost</th>
            <th>Balance</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th>BC</th>
            <th><?= $olddata->pay ?></th>
            <th><?= $olddata->exp ?></th>
            <th><?= $olddata->pay - $olddata->exp ?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $p=$olddata->pay;
            $c=$olddata->exp;
            $bal= $olddata->pay - $olddata->exp;
        if($nowdata){
            foreach($nowdata as $i=>$mem){
                $p+=$mem->pay;
                $c+=$mem->exp;
                $bal+=$mem->pay;
                $bal-=$mem->exp;
        ?>
            <tr>
                <th><?= ++$i ?></th>
                <th><?= $mem->pdate ?></th>
                <th><?= $mem->note ?></th>
                <th><?= $mem->pay ?></th>
                <th><?= $mem->exp ?></th>
                <th><?= $bal ?></th>
            </tr>
        <?php }} ?>
    </tbody>
    <tfoot>
        <tr>
            <th style="text-align:right" colspan="3"> Total</th>
            <th> <?= $p ?></th>
            <th> <?= $c ?></th>
            <th> <?= $bal ?></th>
        </tr>
    </tfoot>
</table>