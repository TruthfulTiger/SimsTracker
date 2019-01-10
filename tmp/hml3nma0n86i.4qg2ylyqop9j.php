<h3 class="text-primary">Summary</h3>
<div class="form-row">
    <div class="col">
        <div class="form-group mb-2">
            <label for="challengeName">Challenge name</label>
            <input type="text" id="challengeName" value="<?= (trim($challenge['challengeName'])) ?>" name="challengeName" class="form-control"/>
        </div>
    </div>
	<div class="col">
		<div class="form-group mb-2">
			<label for="name">Household name</label>
			<input type="text" id="name" value="<?= (trim($household['name'])) ?>" name="name" class="form-control"/>
		</div>
	</div>
</div>
<div class="form-group mb-2">
	<p>Is this also a <a href="https://web.archive.org/web/20110112123130/http://community.livejournal.com/rainbowlegacy/tag/rules" target="_blank">Rainbow Challenge?</a></p>
	<div class="custom-control custom-radio">
		<input type="radio" id="no" value="0" name="isRainbow" class="custom-control-input"
		<?php if ($s2legacy['isRainbow'] == 0): ?>
			checked
		<?php endif; ?>
		>
		<label class="custom-control-label" for="no">No</label>
	</div>
	<div class="custom-control custom-radio">
		<input type="radio" id="yes" value="1" name="isRainbow" class="custom-control-input"
		<?php if ($s2legacy['isRainbow'] == 1): ?>
			checked
		<?php endif; ?>
		>
		<label class="custom-control-label" for="yes">Yes</label>
	</div>
</div>
<div class="form-group mb-2" id="gen1heir">
	<label for="founder">Founder</label>
	<select class="custom-select" name="founder" id="founder">
		<?php foreach (($sims?:[]) as $sim): ?>
			<?php if ($sim['age'] == 'Young Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
			<?php if ($sim['age'] == 'Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</div>
<div class="form-group mb-2" id="gen2heir" style="display: none">
	<label for="founder">Generation 2 heir/ess</label>
	<select class="custom-select" name="gen2" id="gen2">
		<?php foreach (($sims?:[]) as $sim): ?>
			<?php if ($sim['age'] == 'Young Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
			<?php if ($sim['age'] == 'Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</div>
<div class="form-group mb-2" id="gen3heir" style="display: none">
	<label for="founder">Generation 3 heir/ess</label>
	<select class="custom-select" name="gen3" id="gen3">
		<?php foreach (($sims?:[]) as $sim): ?>
			<?php if ($sim['age'] == 'Young Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
			<?php if ($sim['age'] == 'Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</div>
<div class="form-group mb-2" id="gen4heir" style="display: none">
	<label for="founder">Generation 4 heir/ess</label>
	<select class="custom-select" name="gen4" id="gen4">
		<?php foreach (($sims?:[]) as $sim): ?>
			<?php if ($sim['age'] == 'Young Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
			<?php if ($sim['age'] == 'Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</div>
<div class="form-group mb-2" id="gen5heir" style="display: none">
	<label for="founder">Generation 5 heir/ess</label>
	<select class="custom-select" name="gen5" id="gen5">
		<?php foreach (($sims?:[]) as $sim): ?>
			<?php if ($sim['age'] == 'Young Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
			<?php if ($sim['age'] == 'Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</div>
<div class="form-group mb-2" id="gen6heir" style="display: none">
	<label for="founder">Generation 6 heir/ess</label>
	<select class="custom-select" name="gen6" id="gen6">
		<?php foreach (($sims?:[]) as $sim): ?>
			<?php if ($sim['age'] == 'Young Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
			<?php if ($sim['age'] == 'Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</div>
<div class="form-group mb-2" id="gen7heir" style="display: none">
	<label for="founder">Generation 7 heir/ess</label>
	<select class="custom-select" name="gen7" id="gen7">
		<?php foreach (($sims?:[]) as $sim): ?>
			<?php if ($sim['age'] == 'Young Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
			<?php if ($sim['age'] == 'Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</div>
<div class="form-group mb-2" id="gen8heir" style="display: none">
	<label for="founder">Generation 8 heir/ess</label>
	<select class="custom-select" name="gen8" id="gen8">
		<?php foreach (($sims?:[]) as $sim): ?>
			<?php if ($sim['age'] == 'Young Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
			<?php if ($sim['age'] == 'Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</div>
<div class="form-group mb-2" id="gen9heir" style="display: none">
	<label for="founder">Generation 9 heir/ess</label>
	<select class="custom-select" name="gen9" id="gen9">
		<?php foreach (($sims?:[]) as $sim): ?>
			<?php if ($sim['age'] == 'Young Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
			<?php if ($sim['age'] == 'Adult'): ?>
				<option value="<?= ($sim['firstName']) ?>"
				><?= ($sim['firstName']) ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</div>


<input type="hidden" name="grandtotal" id="gt" value="<?= (trim($s2legacy['grandtotal'])) ?>">
<p class="lead mt-3"><b>Grand total: <output id="grandtotal" for="gt"><span
    <?php if ($s2legacy['grandtotal']  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($s2legacy['grandtotal']  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($s2legacy['grandtotal']  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= (trim($s2legacy['grandtotal']))."
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