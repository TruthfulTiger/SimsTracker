<?php if ($hhID != null): ?>
	
		<form action="<?= ($BASE.'/legacy/create') ?>" method="post" class="form-horizontal">

			<div class="form-group">
				<label for="challengeName">Name</label>
				<input type="text" class="form-control" name="challengeName" id="challengeName" />
			</div>

			<div class="form-group">
				<label for="challengeType">Challenge Type</label>
				<select class="custom-select" name="challengeType" id="challengeType">
					<option value="Standard">Standard</option>
					<option value="Rainbow">Rainbow</option>
				</select>
			</div>

			<div class="control-group">
				<div class="">
					<input type="text" name="hptrap" class="hptrap" />
					<input type="hidden" name="hhID" value="<?= ($hhID) ?>" />
					<input type="hidden" name="userID" value="<?= ($SESSION['user'][2]) ?>" />
					<input type="hidden" name="create" value="create" />
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Challenge</button>
					<a href="<?= ($BASE.'/challenges') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
				</div>
			</div>
		</form>
	
	<?php else: ?>
		<div class="form-group">
			<label for="hh">Which household is this challenge part of?</label>
			<select class="custom-select" name="hh" id="hh">
				<option value="">-- Choose a household --</option>
				<?php foreach (($households?:[]) as $household): ?>
					<option value="<?= ($household['hhID']) ?>"><?= ($household['name']) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<a href="" id="url" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
		<a href="<?= ($BASE.'/challenges') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
	
<?php endif; ?>


<script>
	$(function () {
		let v = $("#hh").children("option:selected").val();
		url(v);
		$("#hh").change(function(){
			v = $("#hh").children("option:selected").val();
			url(v);
		});
	});

	function url(v) {
		if (v === '') {
			$('#url').attr("href","<?= ($BASE.'/household/create/') ?>");
		} else {
			$('#url').attr("href","<?= ($BASE.'/legacy/create/') ?>"+v);
		}
	}
</script>