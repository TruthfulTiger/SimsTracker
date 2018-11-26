<?php if ($hhID != null): ?>
	
		<form action="<?= ($BASE.'/sim/create') ?>" method="post" class="form-horizontal">
		<div class="form-group">
			<label for="firstName">First Name</label>
			<input type="text" class="form-control" name="firstName" id="firstName" />
		</div>

		<div class="form-group">
			<label for="lastName">Last Name</label>
			<input type="text" class="form-control" name="lastName" id="lastName" />
		</div>

		<div class="form-group">
			<label for="gender">Gender</label>
			<select class="custom-select" name="gender" id="gender">
				<option value="F">Female</option>
				<option value="M">Male</option>
			</select>
		</div>

			<div class="form-group">
				<label for="age">Age</label>
				<select class="custom-select" name="age" id="age">
					<?php foreach (($ages?:[]) as $age): ?>
						<option value="<?= ($age) ?>"><?= ($age) ?></option>
					<?php endforeach; ?>
				</select>
			</div>

		<div class="form-group">
			<label for="aspiration">Aspiration</label>
			<select class="custom-select" name="aspiration" id="aspiration">
				<?php foreach (($aspirations?:[]) as $aspiration): ?>
					<option value="<?= ($aspiration) ?>"><?= ($aspiration) ?></option>
				<?php endforeach; ?>
			</select>
		</div>

			<div class="control-group">
				<div class="">
					<input type="text" name="hptrap" class="hptrap" />
					<input type="hidden" name="hhID" value="<?= ($hhID) ?>" />
					<input type="hidden" name="userID" value="<?= ($SESSION['user'][2]) ?>" />
					<input type="hidden" name="create" value="create" />
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Sim</button>
					<a href="<?= ($BASE.'/sims') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
				</div>
			</div>
		</form>
	
	<?php else: ?>
			<div class="form-group">
				<label for="hh">Which household is this Sim part of?</label>
				<select class="custom-select" name="hh" id="hh">
					<option value="">-- Create new household --</option>
					<?php foreach (($households?:[]) as $household): ?>
					<option value="<?= ($household['hhID']) ?>"><?= ($household['name']) ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<a href="" id="url" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
		<a href="<?= ($BASE.'/sims') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
	
<?php endif; ?>
<script>
	$(function () {
		$('#url').attr("href","<?= ($BASE.'/household/create/') ?>");
		aspCheck();

		$("#hh").change(function(){
			let v = $("#hh").children("option:selected").val();
			if (v !== "") {
				$('#url').attr("href","<?= ($BASE.'/sim/create/') ?>"+v);
			} else {
				$('#url').attr("href","<?= ($BASE.'/household/create/') ?>");
			}
		});

		$('#age').change(function () {
			aspCheck();
		});
	});

	function aspCheck() {
		switch ($( "#age" ).val()) {
			case 'Infant':
				$("#aspiration").val("Grow Up");
				$('#aspiration').attr("disabled",'disabled').siblings().removeAttr('disabled');
				break;
			case 'Toddler':
				$("#aspiration").val("Grow Up");
				$('#aspiration').attr("disabled",'disabled').siblings().removeAttr('disabled');
				break;
			case 'Child':
				$("#aspiration").val("Grow Up");
				$('#aspiration').attr("disabled",'disabled').siblings().removeAttr('disabled');
				break;
			case 'Teen':
				//$("#aspiration").val("Family");
				$('#aspiration').removeAttr("disabled");
				$('select').children('option[value="Grow Up"]').attr('disabled', true)
					.siblings().removeAttr('disabled');
				break;
			case 'Young Adult':
				//$("#aspiration").val("Family");
				$('#aspiration').removeAttr("disabled");
				$('select').children('option[value="Grow Up"]').attr('disabled', true)
					.siblings().removeAttr('disabled');
				break;
			case 'Adult':
				//$("#aspiration").val("Family");
				$('#aspiration').removeAttr("disabled");
				$('select').children('option[value="Grow Up"]').attr('disabled', true)
					.siblings().removeAttr('disabled');
				break;
			case 'Elder':
				//$("#aspiration").val("Family");
				$('#aspiration').removeAttr("disabled");
				$('select').children('option[value="Grow Up"]').attr('disabled', true)
					.siblings().removeAttr('disabled');
				break;
			default:
				$("#aspiration").val("Grow Up");
				$('#aspiration').attr("disabled",'disabled').siblings().removeAttr('disabled');
				break;
		}
	}

</script>
