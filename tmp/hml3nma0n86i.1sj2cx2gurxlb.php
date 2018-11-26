<form action="<?= ($BASE.'/legacy/update') ?>" method="post" class="form-horizontal">

	<div class="form-group">
		<label for="name">Household Name</label>
		<input type="text" class="form-control" name="name" value="<?= ($household['name']) ?>" id="name" />
	</div>

	<div class="form-group">
	<label for="currentGen">Current Generation</label>
	<input type="number" class="form-control" name="currentGen" value="<?= ($s2legacy['currentGen']) ?>" id="currentGen" />
</div>

	<div class="control-group">
		<div class="">
			<input type="text" name="hptrap" class="hptrap" />
			<input type="hidden" name="update" value="update" />
			<input type="hidden" name="id" value="<?= ($s2legacy['id']) ?>" />
			<button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
		</div>
	</div>
</form>