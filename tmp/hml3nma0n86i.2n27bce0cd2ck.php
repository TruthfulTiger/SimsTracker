<?php if ($nhID != null): ?>
	
		<form action="<?= ($BASE.'/household/create') ?>" validate="true" method="post" class="form-horizontal">
			<div class="form-group">
				<label for="name">Household Name</label>
				<input type="text" required="required" class="form-control" name="name" id="name" />
			</div>

			<div class="control-group">
				<div class="">
					<input type="text" name="hptrap" class="hptrap" />
					<input type="hidden" name="nhID" value="<?= ($nhID) ?>" />
					<input type="hidden" name="create" value="create" />
					<input type="hidden" name="userID" value="<?= ($SESSION['user'][2]) ?>" />
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Household</button>
					<a href="<?= ($BASE.'/households') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
				</div>
			</div>
		</form>
		
<?php else: ?>
	<div class="form-group">
		<label for="nh">Which neighbourhood is this household part of?</label>
		<select class="custom-select" required="required" name="nh" id="nh">
			<option value="">-- Create new hood --</option>
			<?php foreach (($hoods?:[]) as $hood): ?>
				<option value="<?= ($hood['id']) ?>"><?= ($hood['name']) ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<a href="" id="url" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
	<a href="<?= ($BASE.'/households') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>

<?php endif; ?>

<script>
	$(function () {
		let v = $("#nh").children("option:selected").val();
		url(v);
		$("#nh").change(function(){
			v = $("#nh").children("option:selected").val();
			url(v);
		});
	});

	function url(v) {
		if (v === '') {
			$('#url').attr("href","<?= ($BASE.'/hood/create/') ?>");
		} else {
			$('#url').attr("href","<?= ($BASE.'/household/create/') ?>"+v);
		}
	}
</script>