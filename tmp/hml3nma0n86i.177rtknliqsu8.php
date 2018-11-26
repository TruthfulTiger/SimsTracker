<h3><?= ($cat) ?> <img src="<?= ($BASE) ?><?= ($s2path) ?>BV.png" alt="Needs BV"> <a href="#" class="badge badge-pill badge-secondary title" data-toggle="collapse" data-target="#ftHelp" aria-expanded="false" aria-controls="ftHelp">
	?</a>
	</a></h3>
<div class="collapse" id="ftHelp">
	<div class="card card-body">
		<dt>From SimsLegacyChallenge.com</dt>
		<dd>1 point for every 9 unique vacation memories earned by the founder of an heir. This bonus works like the family friends score, where you only count the highest number of vacation memories earned, and keep that high score even after the sim dies. These points max out at 5 once a single sim has earned all 45 vacation memories.
			<br/><br/>
			2 points if the founder or heir purchases a vacation home. To earn this point, the generation who purchases the home and every generation afterwards must spend at least one successful vacation at the house. The vacation home may be located in any of the tree main vacation locations and may be pre-built if you wish.
			<br/><br/>
			1 point if your founder is the first to buy and vacation at this house.
			<br/><br/>
			2 points if you collect every single souvineer from vacation and display them in the house. This includes purchased and dug-up items.
			<br/><br/>
			-1 if you have a bad vacation. This is per vacation, regardless of how many Sims went on the vacation.
		</dd>
	</div>
</div>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="mementototal">Amount of mementos</label>
            <input type="number" class="form-control bv" min="0" max="45" id="mementototal" value="<?= ($mementototal) ?>" name="mementototal"/>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input bv" value="1" name="vhome" id="vhome" <?= ($vhchk) ?>/>
                <label class="custom-control-label" for="vhome">Bought and holidayed at Vacation Home</label>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input bv" value="1" name="vhfounder" id="vhfounder" <?= ($vhfchk) ?>/>
                <label class="custom-control-label" for="vhfounder">Vacation Home bought by Founder</label>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input bv" value="1" name="souvenirs" id="souvenirs" <?= ($svchk) ?>/>
                <label class="custom-control-label" for="souvenirs">Every souvenir is displayed in home</label>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="bvt" id="bvt" value="<?= ($bvtotal) ?>">
<p class="lead mb-3"><b>Sub total: <output id="bvtotal" name="bvtotal" for="bvt"><span
    <?php if ($bvtotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($bvtotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($bvtotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($bvtotal)."
" ?>
	</span></output></b></p>

<script>
	$(function () {
		$(".bv").change(function(){
			let boxes = $('.bv:checked').length;
			if ($('#vhome').prop('checked'))
				boxes ++;
			if ($('#souvenirs').prop('checked'))
				boxes ++;
			let mementos = $("#mementototal").val();
			bvSub(boxes, mementos);
		});
	});

	function bvSub(boxes, mementos) {
		m = mementos / 9;
		let result = parseInt(m) + parseInt(boxes);

		$("#bvtotal").val(result);
		$("#bvt").val(result);

		gtChange();

		if (result == 0) {
			$('#bvtotal').removeClass('badge badge-danger');
			$('#bvtotal').removeClass('badge badge-success');
			$('#bvtotal').addClass('badge badge-primary');
		}


		if (result > 0) {
			$('#bvtotal').removeClass('badge badge-danger');
			$('#bvtotal').removeClass('badge badge-primary');
			$('#bvtotal').addClass('badge badge-success');
		}

		if (result < 0) {
			$('#bvtotal').removeClass('badge badge-primary');
			$('#bvtotal').removeClass('badge badge-success');
			$('#bvtotal').addClass('badge badge-danger');
		}
	}
</script>