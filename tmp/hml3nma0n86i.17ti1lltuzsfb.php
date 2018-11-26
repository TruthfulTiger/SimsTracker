<form action="<?= ($BASE.'/challenge/create') ?>" validate="true" method="post" class="form-horizontal">

	<div class="form-group">
		<label for="challengeName">Name</label>
		<input type="text" required="required" class="form-control" name="challengeName" id="challengeName" />
	</div>
<?php if ($hhID != null): ?>
		<div class="form-group">
			<label for="hhType">Challenge Type</label>
			<select class="custom-select" required="required" name="type" id="hhType">
				<option value="">-- Choose a type --</option>
				<?php foreach (($s2hhchallenges?:[]) as $key=>$value): ?>
					<option value="<?= ($value) ?>"><?= ($value) ?></option>
				<?php endforeach; ?>
			</select>
			<input type="hidden" name="hhID" value="<?= ($hhID) ?>" />
		</div>
<?php endif; ?>
<?php if ($nhID != null): ?>
	<div class="form-group">
		<label for="nhType">Challenge Type</label>
		<select class="custom-select" required="required" name="type" id="nhType">
			<option value="">-- Choose a type --</option>
			<?php foreach (($s2hoodchallenges?:[]) as $key=>$value): ?>
				<option value="<?= ($value) ?>"><?= ($value) ?></option>
			<?php endforeach; ?>
		</select>
		<input type="hidden" name="nhID" value="<?= ($nhID) ?>" />
	</div>
<?php endif; ?>
	<div class="control-group">
		<div class="">
			<input type="text" name="hptrap" class="hptrap" />
			<input type="hidden" name="userID" value="<?= ($SESSION['user'][2]) ?>" />
			<input type="hidden" name="create" value="create" />
			<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Challenge</button>
			<a href="<?= ($BASE.'/challenges') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
		</div>
	</div>
</form>