<p class="mb-3">Pick a random aspiration for when your child Sim becomes a Teen. Includes turn-ons / offs where applicable.</p>
<ul class="nav nav-tabs" id="games" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" id="sims2-tab" data-toggle="tab" href="#sims2" role="tab" aria-controls="sims2" aria-selected="true">Sims 2</a>
	</li>
	<li class="nav-item">
		<a class="nav-link disabled" id="sims3-tab" data-toggle="tab" href="#sims3" role="tab" aria-controls="sims3" aria-selected="false">Sims 3</a>
	</li>
	<li class="nav-item">
		<a class="nav-link disabled" id="sims4-tab" data-toggle="tab" href="#sims4" role="tab" aria-controls="sims4" aria-selected="false">Sims 4</a>
	</li>
</ul>
<div class="tab-content mt-3" id="gamesContent">
	<div class="tab-pane fade show active" id="sims2" role="tabpanel" aria-labelledby="sims2-tab">
		<p>Which expansions do you own?</p>
		<div class="form-group mb-4">
			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" id="uni" checked name="uni" class="custom-control-input">
				<label class="custom-control-label" for="uni"><img src="<?= ($BASE) ?><?= ($s2path) ?>UNI.png" alt="University"></label>
			</div>
			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" id="nl" checked name="nl" class="custom-control-input">
				<label class="custom-control-label" for="nl"><img src="<?= ($BASE) ?><?= ($s2path) ?>NL.png" alt="Nightlife"></label>
			</div>
			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" id="ofb" checked name="ofb" class="custom-control-input">
				<label class="custom-control-label" for="ofb"><img src="<?= ($BASE) ?><?= ($s2path) ?>OFB.png" alt="Open For Business"></label>
			</div>
			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" id="pets" checked name="pets" class="custom-control-input">
				<label class="custom-control-label" for="pets"><img src="<?= ($BASE) ?><?= ($s2path) ?>Pets.png" alt="Pets"></label>
			</div>
			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" id="sns" checked name="sns" class="custom-control-input">
				<label class="custom-control-label" for="sns"><img src="<?= ($BASE) ?><?= ($s2path) ?>Seasons.png" alt="Seasons"></label>
			</div>
			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" id="bv" checked name="bv" class="custom-control-input">
				<label class="custom-control-label" for="bv"><img src="<?= ($BASE) ?><?= ($s2path) ?>BV.png" alt="Bon Voyage"></label>
			</div>
			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" id="ft" checked name="ft" class="custom-control-input">
				<label class="custom-control-label" for="ft"><img src="<?= ($BASE) ?><?= ($s2path) ?>FT.png" alt="Free Time"></label>
			</div>
			<div class="custom-control custom-checkbox custom-control-inline">
				<input type="checkbox" id="al" checked name="al" class="custom-control-input">
				<label class="custom-control-label" for="al"><img src="<?= ($BASE) ?><?= ($s2path) ?>AL.png" alt="Apartment Life"></label>
			</div>
			<div class="form-group mt-3">
				<div class="custom-control custom-checkbox custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="cheese">
					<label class="custom-control-label" for="cheese">Include Grilled Cheese</label>
				</div>
				<div class="custom-control custom-checkbox custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" checked id="tocheck">
					<label class="custom-control-label" for="tocheck">Check for turn-ons</label>
				</div>
			</div>
		</div>

		<div class="card w-25">
			<div class="card-body text-center">
				<img id="aspiration" src="<?= ($BASE) ?><?= ($s2path) ?>Null.png" alt="">
				<hr/>
				<div class="row">
					<div class="col">
						<img id="ton1" src="<?= ($BASE) ?><?= ($s2path) ?>null.png" alt="">
						<img id="ton2" src="<?= ($BASE) ?><?= ($s2path) ?>null.png" alt="">
						<img id="toff" src="<?= ($BASE) ?><?= ($s2path) ?>null.png" alt="">
					</div>
				</div>
			</div>
			<div class="card-footer text-center">
				<button class="btn btn-success" id="sims2gen">Generate</button>
			</div>

		</div>
	</div> 
	<div class="tab-pane fade" id="sims3" role="tabpanel" aria-labelledby="sims3-tab">
		TO DO: Sims 3
	</div> 
	<div class="tab-pane fade" id="sims4" role="tabpanel" aria-labelledby="sims4-tab">
		TO DO: Sims 4
</div> 

	<script type="text/javascript">s2path='<?= ($BASE) ?><?= ($s2path) ?>';</script>
	<script src="<?= ($BASE) ?>/ui/js/aspgen.js"></script>