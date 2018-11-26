<form action="<?= ($BASE.'/hood/create') ?>" method="post" class="form-horizontal">

	<div class="form-group">
		<label for="name">Neighbourhood Name</label>
		<input type="text" class="form-control" name="name" id="name" />
	</div>

	<div class="form-group">
		<label for="gameVersion">Game version</label>
		<select class="custom-select" name="gameVersion" id="gameVersion">
			<option value="">-- Sims version --</option>
			<?php foreach (($games?:[]) as $key=>$value): ?>
				<option value="<?= ($value) ?>"><?= ($value) ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group" id="sims2" style="display:none">
		<label for="s2type">Type</label>
		<select class="custom-select" name="s2type" id="s2type">
			<option value="">-- Hood type --</option>
			<?php foreach (($s2hoodTypes?:[]) as $key=>$value): ?>
				<option value="<?= ($value) ?>"><?= ($value) ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group" id="sims3" style="display:none">
		<label for="s3type">Type</label>
		<select class="custom-select" name="s3type" id="s3type">
			<option value="">-- Hood type --</option>
			<?php foreach (($s3hoodTypes?:[]) as $key=>$value): ?>
				<option value="<?= ($value) ?>"><?= ($value) ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group" id="sims4" style="display:none">
		<label for="s4type">Type</label>
		<select class="custom-select" name="s4type" id="s4type">
			<option value="">-- Hood type --</option>
			<?php foreach (($s4hoodTypes?:[]) as $key=>$value): ?>
				<option value="<?= ($value) ?>"><?= ($value) ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="control-group">
		<div class="">
			<input type="text" name="hptrap" class="hptrap" />
			<input type="hidden" name="create" value="create" />
			<input type="hidden" name="userID" value="<?= ($SESSION['user'][2]) ?>" />
			<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Neighbourhood</button>
			<a href="<?= ($BASE.'/hoods') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
		</div>
	</div>
</form>

<script>
	$(function () {
		$("#gameVersion").change(function(){
			let v = $("#gameVersion").children("option:selected").val();
			if (v == 'Sims 2') {
				$("div#sims2").show();
				$('select#s2type').attr("name","type");
			} else  {
				$("div#sims2").hide();
				$('select#s2type').attr("name","s2type");
			}
			if (v == 'Sims 3') {
				$("div#sims3").show();
				$('select#s3type').attr("name","type");
			} else  {
				$("div#sims3").hide();
				$('select#s3type').attr("name","s3type");
			}
			if (v == 'Sims 4') {
				$("div#sims4").show();
				$('select#s4type').attr("name","type");
			} else  {
				$("div#sims4").hide();
				$('select#s4type').attr("name","s4type");
			}
		});
	});
</script>