<?php if ($hoods): ?>
	
		<table width="600" cellpadding="5" class="table table-hover table-bordered">
			<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Game version</th>
				<th scope="col">Type</th>
				<th scope="col">Number of households</th>
				<th scope="col">Action</th>
			</tr>
			</thead>

			<tbody>
			<?php foreach (($hoods?:[]) as $hood): ?>
				<tr>
					<td><?= (trim($hood['name'])) ?></td>
					<td><?= (trim($hood['gameVersion'])) ?></td>
					<td><?= (trim($hood['type'])) ?></td>
					<?php if ($hood['households'] > 0): ?>
					
						<td><?= (trim($hood['households'])) ?></td>
					
					<?php else: ?>
					<td>0</td>
					
					<?php endif; ?>
					<td><a href="<?= ($BASE.'/hood/update/'. $hood['id']) ?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
						<a href="<?= ($BASE.'/hood/delete/'. $hood['id']) ?>"
						   data-toggle="confirmation"
						   data-content="This will delete this hood and all associated data."
						   class="btn btn-danger delete"><i class="fa fa-trash" aria-hidden="true"></i>
							Delete</a></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	
	<?php else: ?>
		<p>No neighbourhoods found.</p>
	
<?php endif; ?>
<a href="<?= ($BASE.'/hood/create') ?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
