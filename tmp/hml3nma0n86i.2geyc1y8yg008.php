<form action="<?= ($BASE.'/user/create') ?>" method="post" class="form-horizontal">

	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
		</div>
		<input type="text" class="form-control" placeholder="Display Name" id="name" name="name" aria-label="Display Name" aria-describedby="basic-addon1"/>
	</div>

	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon2"><i class="fa fa-at"></i></span>
		</div>
		<input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-label="email" aria-describedby="basic-addon2"/>
	</div>

	<div class="control-group">
		<div class="">
			<input type="text" name="hptrap" class="hptrap" />
			<input type="hidden" name="create" value="create" />
			<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</button>
			<a href="<?= ($BASE.'/users') ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Cancel</a>
		</div>
	</div>

</form>