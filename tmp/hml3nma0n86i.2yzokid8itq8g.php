<h3><?= ($cat) ?> <img src="<?= ($BASE) ?><?= ($s2path) ?>FT.png" alt="Needs FT"> <a href="#" class="badge badge-pill badge-secondary title" data-toggle="collapse" data-target="#ftHelp" aria-expanded="false" aria-controls="ftHelp">
	?</a>
	</a></h3>
<div class="collapse" id="ftHelp">
	<div class="card card-body">
		<dt>From SimsLegacyChallenge.com</dt>
		<dd><h6>Family Pastime</h6>
			To earn any of these points, the founder must reach the maximum interest level in at least 1 hobby before they die. This hobby does NOT have to be the founder’s “pre-destined hobby” assigned to them by the game, it may be any hobby you wish. The first hobby that the founder maxes their interest in becomes the “family hobby” for the rest of the challenge.
			<br/><br/>
			You may have your sims gain interest in other hobbies aside from the family hobby
			<br/><br/>
			There is no penalty for a sim who is part of the bloodline not reaching maximum interest in the family hobby before death, you simply do not earn the half point for them.
			<br/><br/>
			If the founder dies before reaching the maximum interest in any hobby, you will be unable to gain any points in this category.
		</dd>
	</div>
</div>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="familyhobby">Family Hobby</label>
            <select class="custom-select" name="familyhobby" id="familyhobby">
                <?php foreach (($hobbies?:[]) as $key=>$hobby): ?>
                    <option value="<?= ($key) ?>" <?php if ($familyhobby == $key): ?>
					selected
                     <?php endif; ?>><?= ($hobby) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="fhmax">Number of Sims to max Family Hobby</label>
            <input type="number" min="0" class="form-control" id="fhmax" oninput="ftmaxChange(value)" value="<?= ($fhmax) ?>" name="fhmax"/>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" value="1" onchange="ftCheck()" name="pdhobby" id="pdhobby" <?= ($pdchk) ?>/>
                <label class="custom-control-label" for="pdhobby">Family Hobby is Founder's Pre-Destined Hobby</label>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="ftt" id="ftt" value="<?= ($fttotal) ?>">
<p class="lead mb-3"><b>Sub total: <output id="fttotal" name="fttotal" for="ftt"><span
    <?php if ($fttotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($fttotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($fttotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($fttotal)."
" ?>
	</span></output></b></p>

<script>
	let ft = 0;
	function ftCheck() {
		if ( $('#pdhobby').prop("checked"))  {
			if (<?= ($pdhobby) ?> == 0) {
				ft ++;
			}
		else
			ft = 1;
		} else {
			if (<?= ($pdhobby) ?> == 1) {
				ft = 1;
				ft --;
			}
		else
			ft = 0;
		}

		let m = $("#fhmax").val();

		ftSub(ft, m);
	}

	function ftmaxChange(m) {
		document.querySelector('#fhmax').value = m;
		ftSub(ft, m);
	}

	function ftSub(ft, m) {
		let result = parseFloat(ft) + (parseFloat(m) * 0.5);

		$("#fttotal").val(result);
		$("#ftt").val(result);

		gtChange();

		if (result == 0) {
			$('#fttotal').removeClass('badge badge-danger');
			$('#fttotal').removeClass('badge badge-success');
			$('#fttotal').addClass('badge badge-primary');
		}


		if (result > 0) {
			$('#fttotal').removeClass('badge badge-danger');
			$('#fttotal').removeClass('badge badge-primary');
			$('#fttotal').addClass('badge badge-success');
		}

		if (result < 0) {
			$('#fttotal').removeClass('badge badge-primary');
			$('#fttotal').removeClass('badge badge-success');
			$('#fttotal').addClass('badge badge-danger');
		}
	}
</script>