<form action="<?= ($BASE.'/challenge/update') ?>" validate="true" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="challengeName">Name</label>
		<input type="text" required="required" class="form-control" value="<?= ($challenge['challengeName']) ?>" name="challengeName" id="challengeName" />
	</div>
	<?php if ($challenge['hhID'] != null): ?>
		<div class="form-group">
			<label for="hhType">Challenge Type</label>
			<select class="custom-select" required="required" name="type" id="hhType">
				<option value="">-- Choose a type --</option>
				<?php foreach (($s2hhchallenges?:[]) as $key=>$value): ?>
					<option value="<?= ($value) ?>"
					<?php if ($challenge['type'] == $value): ?>
						selected
					<?php endif; ?>><?= ($value) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<?php endif; ?>
	<?php if ($challenge['nhID'] != null): ?>
		<div class="form-group">
			<label for="nhType">Challenge Type</label>
			<select class="custom-select" required="required" name="type" id="nhType">
				<option value="">-- Choose a type --</option>
				<?php foreach (($s2hoodchallenges?:[]) as $key=>$value): ?>
					<option value="<?= ($value) ?>"
					<?php if ($challenge['type'] == $value): ?>
						selected
					<?php endif; ?>><?= ($value) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<?php endif; ?>
	<div class="control-group">
		<div class="">
			<input type="text" name="hptrap" class="hptrap" />
			<input type="hidden" name="update" value="update" />
			<input type="hidden" name="hhID" value="<?= ($household['hhID']) ?>" />
			<input type="hidden" name="userID" value="<?= ($SESSION['user'][2]) ?>" />
			<input type="hidden" name="id" value="<?= ($challenge['id']) ?>" />
			<button type="submit" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> Update</button>
			<?php if ($challenge['type'] == 'Legacy Challenge'): ?>
				<?php if ($s2legacy['id'] == 0): ?>
					
						<a href="<?= ($BASE.'/s2legacy/'. $challenge['id']) ?>/<?= ($SESSION['user'][2]) ?>/<?= ($challenge['hhID']) ?>" class="btn btn-success"><i class="fa fa-dashboard" aria-hidden="true"></i> Go to scoresheet</a>
					
					<?php else: ?>
						<a href="<?= ($BASE.'/s2legacy/'. $s2legacy['id']) ?>" class="btn btn-success"><i class="fa fa-dashboard" aria-hidden="true"></i> Go to scoresheet</a>
					
				<?php endif; ?>
			<?php endif; ?>
			<a href="<?= ($BASE.'/challenges') ?>" class="btn btn-secondary"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
		</div>
	</div>

</form>