<h3>Summary</h3>
<div class="form-row">
    <div class="col">
        <div class="form-group mb-2">
            <label for="household">Household name</label>
            <input type="text" id="household" name="household" class="form-control"/>
        </div>
    </div>
    <div class="col">
        <div class="form-group mb-2">
            <label for="challenge">Challenge type</label>
            <select class="custom-select" name="challenge" id="challenge">
                <option value="standard">Standard</option>
                <option value="rainbow">Rainbow</option>
            </select>
        </div>
    </div>
</div>
<?php $grandtotal=$legacytotal + $moneytotal + $friendstotal + $wantstotal + $gravestotal + $ghoststotal +  $biztotal + $petstotal + $seasonstotal + $bvtotal + $fttotal + $setstotal + $mastertotal + $handicapstotal +  $overflowtotal; ?>
<p class="lead mt-3"><b>Grand total: <output id="grandtotal" name="grandtotal"><span
    <?php if ($grandtotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($grandtotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($grandtotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($grandtotal)."
" ?>
	</span></output></b></p>