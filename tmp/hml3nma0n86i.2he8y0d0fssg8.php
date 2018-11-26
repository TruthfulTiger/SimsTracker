<?php if ($sims): ?>
	
		<table width="600" cellpadding="5" class="table table-hover table-bordered">
			<thead>
			<tr>
				<th scope="col">Household</th>
				<th scope="col">First Name</th>
				<th scope="col">Last Name</th>
				<th scope="col">Age</th>
				<th scope="col">Action</th>
			</tr>
			</thead>

			<tbody>
			<?php foreach (($households?:[]) as $household): ?>
				<?php foreach (($sims?:[]) as $sim): ?>
					<?php if ($sim['hhID'] == $household['hhID']): ?>
						<tr>
							<td><?= (trim($household['name'])) ?></td>
							<td><?= (trim($sim['firstName'])) ?></td>
							<td><?= (trim($sim['lastName'])) ?></td>
							<td><?= (trim($sim['age'])) ?></td>
							<td><a href="<?= ($BASE.'/sim/update/'. $sim['id']) ?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
								<a href="<?= ($BASE.'/sim/delete/'. $sim['id']) ?>"
								   data-toggle="confirmation"
								   data-content="All sim data will be deleted."
								   class="btn btn-danger delete"><i class="fa fa-trash" aria-hidden="true"></i>
									Delete</a></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	
	<?php else: ?>
		<p>No sims found.</p>
	
<?php endif; ?>
<a href="<?= ($BASE.'/sim/create') ?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>