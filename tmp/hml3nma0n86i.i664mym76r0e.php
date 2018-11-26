<?php if ($households): ?>
	
		<table width="600" cellpadding="5" class="table table-hover table-bordered">
			<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Neighbourhood</th>
				<th scope="col">Sims in household</th>
				<th scope="col">Action</th>
			</tr>
			</thead>

			<tbody>
			<?php foreach (($hoods?:[]) as $hood): ?>
				<?php foreach (($households?:[]) as $household): ?>
					<?php if ($household['nhID'] == $hood['id']): ?>
				<tr>
					<td><?= (trim($household['name'])) ?></td>
					<td><?= (trim($hood['name'])) ?></td>
					<?php if ($household['sims'] > 0): ?>
					
						<td><?= (trim($household['sims'])) ?></td>
					
					<?php else: ?>
					<td>0</td>
					
					<?php endif; ?>
					<td><a href="<?= ($BASE.'/household/update/'. $household['hhID']) ?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
						<a href="<?= ($BASE.'/household/delete/'. $household['hhID']) ?>"
						   data-toggle="confirmation"
						   data-content="This will delete this household and all associated data."
						   class="btn btn-danger delete"><i class="fa fa-trash" aria-hidden="true"></i>
							Delete</a></td>
				</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	
	<?php else: ?>
		<p>No households found.</p>
	
<?php endif; ?>
<a href="<?= ($BASE.'/household/create') ?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
