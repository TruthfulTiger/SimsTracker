<?php if ($challenges): ?>
	
		<table width="600" cellpadding="5" class="table table-hover table-bordered">
			<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Household</th>
				<th scope="col">Game</th>
				<th scope="col">Challenge Type</th>
				<th scope="col">Action</th>
			</tr>
			</thead>

			<tbody>
			<?php foreach (($households?:[]) as $household): ?>
				<?php foreach (($challenges?:[]) as $challenge): ?>
					<?php if ($challenge['hhID'] == $household['hhID']): ?>
						<tr>
							<td><?= (trim($challenge['challengeName'])) ?></td>
							<td><?= (trim($household['name'])) ?></td>
							<td><?= (trim($household['game'])) ?></td>
							<td><?= (trim($challenge['challengeType'])) ?></td>
							<td><a href="<?= ($BASE.'/legacy/update/'. $challenge['id']) ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
								<a href="<?= ($BASE.'/legacy/delete/'. $challenge['id']) ?>"
								   data-toggle="confirmation"
								   data-title="Delete challenge?"
								   data-content="All challenge data will be deleted."
								   class="btn btn-danger delete"><i class="fa fa-trash"></i>
									Delete</a></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	
	<?php else: ?>
		<p>No challenges found.</p>
	
<?php endif; ?>
<a href="<?= ($BASE.'/legacy/create') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Create</a>