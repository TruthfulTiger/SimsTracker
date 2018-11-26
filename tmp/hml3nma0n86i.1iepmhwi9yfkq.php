<h3><?= ($cat) ?> <img src="<?= ($BASE) ?><?= ($s2path) ?>Pets.png" alt="Needs Pets"> <a href="#" class="badge badge-pill badge-secondary title" data-toggle="collapse" data-target="#petsHelp" aria-expanded="false" aria-controls="petsHelp">
	?</a>
	</a></h3>
<div class="collapse" id="petsHelp">
	<div class="card card-body">
		<dt>From SimsLegacyChallenge.com</dt>
		<dd>Your Legacy family prides itself on creating a strong and brand new breed. Rather than trying for a strict pedigree, the family seeks to create a new breed, one with a diverse gene pool.
			<br/><br/>
			Pick an animal, dog or cat. This category will only count for one type of animal or the other.
			If you created a pet with the Legacy Founder, that pet becomes the breed founder. If you did not create a pet in CAS, the first animal that joins the family by any means becomes the founder. The pet bloodline works exactly like the family bloodline. Each generation may only have one heir, and that heir must breed to produce the next generation.
			<br/><br/>
			Your goal is to build up the ‘breed strength’ of the family pet.
			<br/><br/>
			Your “Family Breed” points = your breed strength.<br/>
			Like all categories, this one has a maximum of 10 points. Points earned over 10 go into the overflow category.
		</dd>
	</div>
</div>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="1" onchange="petsCheck()" name="casfounder" id="casfounder" <?= ($casfnck) ?>>
                <label class="custom-control-label" for="casfounder">Founder is custom animal</label>
            </div>
        </div>
        <div class="form-group">
            <label for="adopted">Adopted mates</label>
            <input type="number" min="0" class="form-control" oninput="adoptedChange(value)" id="adopted" value="<?= ($adopted) ?>" name="adopted"/>
        </div>
        <div class="form-group">
            <label for="other">Mates brought in by other means</label>
            <input type="number" min="0" class="form-control" id="other" oninput="otherChange(value)" value="<?= ($other) ?>" name="other"/>
        </div>
        <div class="form-group">
            <label for="topbilling">Heirs that have learned all skills and peaked career</label>
            <input type="number" min="0" class="form-control" oninput="topbillingChange(value)" id="topbilling" value="<?= ($topbilling) ?>" name="topbilling"/>
        </div>
    </div>
</div>
<input type="hidden" name="pt" id="pt" value="<?= ($petstotal) ?>">
<p class="lead"><b>Sub total: <output id="petstotal" name="petstotal" for="pt"><span
    <?php if ($petstotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($petstotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($petstotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($petstotal)."
" ?>
	</span></output></b></p>
<script>
	let f = 0;
	function petsCheck() {
		if ( $('#casfounder').prop("checked"))  {
			if (<?= ($casfounder) ?> == 0) {
				f += 0.5;
			}
			else
				f = 0.5;
		} else {
			if (<?= ($casfounder) ?> == 1) {
				f = 0.5;
				f -= 0.5;
			}
		else
			f = 0;
		}

		let o = $("#other").val();
		let t = $("#topbilling").val();
		let a = $("#adopted").val();

		petsSub(f, a, o, t);
	}

	function adoptedChange(a) {
		let o = $("#other").val();
		let t = $("#topbilling").val();
		document.querySelector('#adopted').value = a;
		petsSub(f, a, o, t);
	}

	function otherChange(o) {
		let t = $("#topbilling").val();
		let a = $("#adopted").val();
		document.querySelector('#other').value = o;
		petsSub(f, a, o, t);
	}

	function topbillingChange(t) {
		let o = $("#other").val();
		let a = $("#adopted").val();
		document.querySelector('#topbilling').value = t;
		petsSub(f, a, o, t);
	}

	function petsSub(f, a, o, t) {
		let result = parseFloat(f) + (parseFloat(a) * 0.5) + (parseFloat(o) * 0.25) + (parseFloat(t) * 0.25);
		if (result > 10) {
			let o = result - 10;
			result = 10;
			$("#opets").val(o);
			opetsChange(o);
		} else {
			$("#opets").val(0);
			opetsChange(0);
		}

		$("#petstotal").val(result);
		$("#pt").val(result);
		gtChange();

		if (result == 0) {
			$('#petstotal').removeClass('badge badge-danger');
			$('#petstotal').removeClass('badge badge-success');
			$('#petstotal').addClass('badge badge-primary');
		}


		if (result > 0) {
			$('#petstotal').removeClass('badge badge-danger');
			$('#petstotal').removeClass('badge badge-primary');
			$('#petstotal').addClass('badge badge-success');
		}

		if (result < 0) {
			$('#petstotal').removeClass('badge badge-primary');
			$('#petstotal').removeClass('badge badge-success');
			$('#petstotal').addClass('badge badge-danger');
		}
	}
</script>