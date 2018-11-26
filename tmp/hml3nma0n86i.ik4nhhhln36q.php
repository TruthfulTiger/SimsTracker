<form action="<?= ($BASE.'/hood/update') ?>" validate="true" method="post" class="form-horizontal">

	<div class="form-group">
		<label for="name">Neighbourhood Name</label>
		<input type="text" class="form-control" required="required" value="<?= ($hood['name']) ?>" name="name" id="name" />
	</div>

	<div class="form-group">
		<label for="gameVersion">Game version</label>
		<select class="custom-select" required="required" name="gameVersion" id="gameVersion">
			<option value="">-- Sims version --</option>
			<?php foreach (($games?:[]) as $key=>$value): ?>
				<option value="<?= ($value) ?>" <?php if ($hood['gameVersion'] == $value): ?>
				selected
			<?php endif; ?>><?= ($value) ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group" id="sims2" style="display:none">
		<label for="s2type">Type</label>
		<select class="custom-select" required="required" name="s2type" id="s2type">
			<option value="">-- Hood type --</option>
			<?php foreach (($s2hoodTypes?:[]) as $s2key=>$s2value): ?>
				selected
			>
				<option value="<?= ($s2value) ?>"><?= ($s2value) ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group" id="sims3" style="display:none">
		<label for="s3type">Type</label>
		<select class="custom-select" name="s3type" id="s3type">
			<option value="">-- Hood type --</option>
			<?php foreach (($s3hoodTypes?:[]) as $s3key=>$s3value): ?>
				selected
			>
				<option value="<?= ($s3value) ?>"><?= ($s3value) ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group" id="sims4" style="display:none">
		<label for="s4type">Type</label>
		<select class="custom-select" name="s4type" id="s4type">
			<option value="">-- Hood type --</option>
			<?php foreach (($s4hoodTypes?:[]) as $s4key=>$s4value): ?>
			selected
		>
				<option value="<?= ($s4value) ?>"><?= ($s4value) ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="control-group">
		<div class="">
			<input type="text" name="hptrap" class="hptrap" />
			<input type="hidden" name="id" value="<?= ($hood['id']) ?>" />
			<input type="hidden" name="userID" value="<?= ($SESSION['user'][2]) ?>" />
			<input type="hidden" name="update" value="update" />
			<button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
			<a href="<?= ($BASE.'/household/create/'. $hood['id']) ?>" class="btn btn-success"><i class="fa fa-plus"></i> Manage Households</a>
			<a href="<?= ($BASE.'/challenge/create/hood/'. $hood['id']) ?>" class="btn btn-warning"><i class="fa fa-plus"></i> Set Challenge</a>
			<a href="<?= ($BASE.'/hoods') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
		</div>
	</div>
</form>

<script>
	$(function () {
		let v = $("#gameVersion").children("option:selected").val();
		gameChange(v);
		$("#gameVersion").change(function(){
			v = $("#gameVersion").children("option:selected").val();
			gameChange(v);
		});
	});
	function gameChange(v) {
		if (v == 'Sims 2') {
			$("div#sims2").show();
			$('select#s2type').attr("name","type");
			$("#s2type").val('<?= ($hood['type']) ?>');
		} else  {
			$("div#sims2").hide();
			$('select#s2type').attr("name","s2type");
			$("#s2type").val('');
		}
		if (v == 'Sims 3') {
			$("div#sims3").show();
			$('select#s3type').attr("name","type");
			$("#s3type").val('<?= ($hood['type']) ?>');
		} else  {
			$("div#sims3").hide();
			$('select#s3type').attr("name","s3type");
			$("#s3type").val('');
		}
		if (v == 'Sims 4') {
			$("div#sims4").show();
			$('select#s4type').attr("name","type");
			$("#s4type").val('<?= ($hood['type']) ?>');
		} else  {
			$("div#sims4").hide();
			$('select#s4type').attr("name","s4type");
			$("#s4type").val('');
		}
	}
</script>