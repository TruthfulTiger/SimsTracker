<h3 class="text-primary"><?= ($cat) ?> <a href="#" class="badge badge-pill badge-secondary title" data-toggle="collapse" data-target="#masterHelp" aria-expanded="false" aria-controls="masterHelp">
	?</a>
	</a></h3>
<div class="collapse" id="masterHelp">
	<div class="card card-body">
		<dt>From SimsLegacyChallenge.com</dt>
		<dd>The points in this category are harder than normal. You’ll work harder to earn 1 point in this category than you will to earn 1 point in any other. Good luck. Each bonus may only be earned once, even if you fulfill the conditions more than one time. If you are looking for a simple or casual Legacy Challenge, you may want to skip this category.
		</dd>
	</div>
</div>
<div class="form-row">
    <div class="col">
        <div class="form-group">
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="sheep" id="sheep"
				<?php if ($s2legacy['sheep'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="sheep">Black Sheep</label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="bunnies" id="bunnies"
				<?php if ($s2legacy['bunnies'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="bunnies">Social Bunnies Need Love Too <img src="<?= ($BASE) ?><?= ($s2path) ?>OFB.png" alt="Needs OFB"></label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="spotless" id="spotless"
				<?php if ($s2legacy['spotless'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="spotless">Spotless Record</label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="started" id="started"
				<?php if ($s2legacy['started'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="started">Finish What You Started</label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="prodigy" id="prodigy"
				<?php if ($s2legacy['prodigy'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="prodigy">Child Prodigy</label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="birthday" id="birthday"
				<?php if ($s2legacy['birthday'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="birthday">Happy Birthday</label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="regrets" id="regrets"
				<?php if ($s2legacy['regrets'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="regrets">No Regrets</label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="capitalist" id="capitalist"
				<?php if ($s2legacy['capitalist'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="capitalist">Capitalist Master <img src="<?= ($BASE) ?><?= ($s2path) ?>OFB.png" alt="Needs OFB"></label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="league" id="league"
				<?php if ($s2legacy['league'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="league">Ivy League <img src="<?= ($BASE) ?><?= ($s2path) ?>UNI.png" alt="Needs University"></label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="hhorse" id="hhorse"
				<?php if ($s2legacy['hhorse'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="hhorse">Hobby Horse <img src="<?= ($BASE) ?><?= ($s2path) ?>FT.png" alt="Needs FT"></label>
			</div>
			<hr/>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input master" value="1" name="finish" id="finish"
				<?php if ($s2legacy['finish'] == 1): ?>
					checked
				<?php endif; ?>
				/>
				<label class="custom-control-label" for="finish">Finish Line</label>
			</div>
        </div>
    </div>
</div>
<input type="hidden" name="mastertotal" id="mat" value="<?= (trim($s2legacy['mastertotal'])) ?>">
<p class="lead mb-3"><b>Sub total: <output id="mastertotal" for="mat"><span
    <?php if ($s2legacy['mastertotal']  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($s2legacy['mastertotal']  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($s2legacy['mastertotal']  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= (trim($s2legacy['mastertotal']))."
" ?>
	</span></output></b></p>
<script>
	$(function () {
		let boxes = $('.master:checked').length;
		masterSub(boxes);
		$(".master").change(function(){
			let boxes = $('.master:checked').length;
			masterSub(boxes);
		});
	});

	function masterSub(mresult) {

		$("#mastertotal").val(mresult);
		$("#mat").val(mresult);
		gtChange();

		if (mresult == 0) {
			$('#mastertotal').removeClass('badge badge-danger');
			$('#mastertotal').removeClass('badge badge-success');
			$('#mastertotal').addClass('badge badge-primary');
		}


		if (mresult > 0) {
			$('#mastertotal').removeClass('badge badge-danger');
			$('#mastertotal').removeClass('badge badge-primary');
			$('#mastertotal').addClass('badge badge-success');
		}

		if (mresult < 0) {
			$('#mastertotal').removeClass('badge badge-primary');
			$('#mastertotal').removeClass('badge badge-success');
			$('#mastertotal').addClass('badge badge-danger');
		}
	}
</script>