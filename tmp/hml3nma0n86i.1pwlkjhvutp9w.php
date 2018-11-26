<table width="600" cellpadding="5" class="table table-hover table-bordered">
	<thead>
	<tr>
		<th scope="col">#</th>
		<th scope="col">Name</th>
		<th scope="col">Email</th>
		<th scope="col">Role</th>
		<th scope="col">Created</th>
		<th scope="col">Last login</th>
		<th scope="col">Action</th>
	</tr>
	</thead>

	<tbody>
	<?php foreach (($users?:[]) as $user): ?>
		<tr>
			<th scope="row"><?= (trim($user['id'])) ?></th>
			<td><?= (trim($user['name'])) ?></td>
			<td><?= (trim($user['email'])) ?></td>
			<td><?= (trim($user['role'])) ?></td>
			<td><?= (trim($user['created'])) ?></td>
			<td><?= (trim($user['lastLogin'])) ?></td>
			<td><a href="<?= ($BASE.'/user/update/'. $user['id']) ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
				<a href="<?= ($BASE.'/user/delete/'. $user['id']) ?>" data-toggle="confirmation"
				   data-content="This will delete this user and all associated data."
				   class="btn btn-danger delete"><i class="fa fa-trash"></i>
					Delete</a></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<a href="<?= ($BASE.'/user/create') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Create</a>
