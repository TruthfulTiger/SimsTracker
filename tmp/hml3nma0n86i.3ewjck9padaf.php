<h3>Summary</h3>
<div class="form-row">
    <div class="col">
        <div class="form-group mb-2">
            <label for="household">Household name</label>
            <input type="text" id="household" value="<?= ($household) ?>" name="household" class="form-control"/>
        </div>
    </div>
    <div class="col">
        <div class="form-group mb-2">
            <label for="challenge">Challenge type</label>
            <select class="custom-select" name="challenge" id="challenge">
                <option value="standard" <?php if ($challenge == 'standard'): ?>
				selected
			<?php endif; ?>>Standard</option>
                <option value="rainbow" <?php if ($challenge == 'rainbow'): ?>
				selected
			<?php endif; ?>>Rainbow</option>
            </select>
        </div>
    </div>
</div>
<input type="hidden" name="gt" id="gt" value="<?= ($grandtotal) ?>">
<?php $grandtotal=$legacytotal + $moneytotal + $friendstotal + $wantstotal + $gravestotal + $ghoststotal +  $biztotal + $petstotal + $seasonstotal + $bvtotal + $fttotal + $setstotal + $mastertotal + $handicapstotal +  $overflowtotal; ?>
<p class="lead mt-3"><b>Grand total: <output id="grandtotal" name="grandtotal" for="gt"><span
    <?php if ($grandtotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($grandtotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($grandtotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($grandtotal)."
" ?>
	</span></output></b></p>

<script>
	function gtChange() {
		let lt = $("#lt").val();
		let mt = $("#mt").val();
		let ft = $("#ft").val();
		let wt = $("#wt").val();
		let gvt = $("#gvt").val();
		let ght = $("#ght").val();
		let bt = $("#bt").val();
		let pt = $("#pt").val();
		let st = $("#st").val();
		let bvt = $("#bvt").val();
		let ftt = $("#ftt").val();
		let ct = $("#ct").val();
		let mat = $("#mat").val();
		let ht = $("#ht").val();
		let ot = $("#ot").val();

		let result = parseFloat(lt) + parseFloat(mt) + parseFloat(ft) + parseFloat(wt) + parseFloat(gvt) + parseFloat(ght) + parseFloat(bt) + parseFloat(pt) + parseFloat(st) + parseFloat(bvt) + parseFloat(ftt) + parseFloat(ct) + parseFloat(mat) + parseFloat(ht) + parseFloat(ot);

		$("#grandtotal").val(result);
		$("#gt").val(result);

		if (result == 0) {
			$('#grandtotal').removeClass('badge badge-danger');
			$('#grandtotal').removeClass('badge badge-success');
			$('#grandtotal').addClass('badge badge-primary');
		}


		if (result > 0) {
			$('#grandtotal').removeClass('badge badge-danger');
			$('#grandtotal').removeClass('badge badge-primary');
			$('#grandtotal').addClass('badge badge-success');
		}

		if (result < 0) {
			$('#grandtotal').removeClass('badge badge-primary');
			$('#grandtotal').removeClass('badge badge-success');
			$('#grandtotal').addClass('badge badge-danger');
		}
	}
</script>