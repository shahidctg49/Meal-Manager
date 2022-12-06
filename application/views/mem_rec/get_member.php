<table class="table">
    <thead>
        <tr>
            <th>#SL</th>
            <th>Member Name</th>
            <th>Member Contact</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Dinner</th>
        </tr>
    </thead>
    <tbody>
        <?php if($members){
            foreach($members as $i=>$mem){
        ?>
            <tr>
                <th><?= ++$i ?></th>
                <th><?= $mem->name ?></th>
                <th><?= $mem->contact ?></th>
                <th>
                    <input type="text" name="breakfast[<?= $mem->id ?>]" value="0.5" class="form-controll">
                </th>
                <th>
                    <input type="text" name="lunch[<?= $mem->id ?>]" value="1" class="form-controll">
                </th>
                <th>
                    <input type="text" name="dinner[<?= $mem->id ?>]" value="1" class="form-controll">
                </th>
            </tr>
        <?php }} ?>
    </tbody>
</table>

<button type="submit" class="btn btn-primary">Save</button>