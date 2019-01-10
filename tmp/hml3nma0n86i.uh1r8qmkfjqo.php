<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" id="hhs-tab" data-toggle="tab" href="#hhs" role="tab" aria-controls="hhs" aria-selected="true">Households</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="hoods-tab" data-toggle="tab" href="#hoods" role="tab" aria-controls="hoods" aria-selected="false">Neighbourhoods</a>
	</li>
</ul>
<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="hhs" role="tabpanel" aria-labelledby="hhs-tab">
		<?php if ($challenges): ?>
			
				<table width="600" cellpadding="5" class="table table-hover table-bordered">
					<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Household</th>
						<th scope="col">Challenge Type</th>
						<th scope="col">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach (($challenges?:[]) as $challenge): ?>
						<?php if ($challenge['nhID'] == null): ?>
							<?php foreach (($households?:[]) as $household): ?>
								<?php if ($household['hhID'] == $challenge['hhID']): ?>
									<tr>
										<td><?= (trim($challenge['challengeName'])) ?></td>
										<td><?= (trim($household['name'])) ?></td>
										<td><?= (trim($challenge['type'])) ?></td>
										<td><a href="<?= ($BASE.'/challenge/update/'. $challenge['id']) ?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
											<a href="<?= ($BASE.'/challenge/delete/'. $challenge['id']) ?>"
											   data-toggle="confirmation"
											   data-title-class="text-primary"
											   data-content="All challenge data will be deleted."
											   class="btn btn-danger delete"><i class="fa fa-trash" aria-hidden="true"></i>
												Delete</a></td>
									</tr>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					<?php endforeach; ?>
					</tbody>
				</table>
			
			<?php else: ?>
				<p>No challenges found.</p>
			
		<?php endif; ?>
	</div>
	<div class="tab-pane fade" id="hoods" role="tabpanel" aria-labelledby="hoods-tab">
		<?php if ($challenges): ?>
			
				<table width="600" cellpadding="5" class="table table-hover table-bordered">
					<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Hood</th>
						<th scope="col">Challenge Type</th>
						<th scope="col">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach (($challenges?:[]) as $challenge): ?>
						<?php foreach (($hoods?:[]) as $hood): ?>
							<?php if ($hood['id'] == $challenge['nhID']): ?>
								<?php if ($challenge['hhID'] == null): ?>
									<tr>
										<td><?= (trim($challenge['challengeName'])) ?></td>
										<td><?= (trim($hood['name'])) ?></td>
										<td><?= (trim($challenge['type'])) ?></td>
										<td><a href="<?= ($BASE.'/challenge/update/'. $challenge['id']) ?>" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
											<a href="<?= ($BASE.'/challenge/delete/'. $challenge['id']) ?>"
											   data-toggle="confirmation"
											   data-content="All challenge data will be deleted."
											   class="btn btn-danger delete"><i class="fa fa-trash" aria-hidden="true"></i>
												Delete</a></td>
									</tr>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endforeach; ?>
					</tbody>
				</table>
			
			<?php else: ?>
				<p>No challenges found.</p>
			
		<?php endif; ?>
	</div>
</div>
