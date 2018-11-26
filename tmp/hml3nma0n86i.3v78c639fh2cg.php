<h3><?= ($cat) ?> <a href="#" class="badge badge-pill badge-secondary title" data-toggle="collapse" data-target="#overflowHelp" aria-expanded="false" aria-controls="overflowHelp">
    ?</a>
</a></h3>
<div class="collapse" id="overflowHelp">
    <div class="card card-body">
        <dt>From SimsLegacyChallenge.com</dt>
        <dd>Whenever you earn more than 10 points in another category, those points come into this category. Any penalties the family incurs are subtracted from this category. This category can become negative. Like all the other categories, this category has a max of 10 points. Overflow points earned when this category is maxed out may be cashed in (for a free use of kaching) or wasted.<br/>
            If penalties reduce this category below 10 points, additional overflow points can raise it back up to 10.</dd>
    </div>
</div>

<div class="table-responsive-sm">
	<table class="table table-hover table-bordered">
		<thead>
		<th scope="col">#</th>
		<th scope="col">Category</th>
		<th scope="col">Total overflow points</th>
		</thead>
		<tbody>
		<tr>
			<th scope="row">1</th>
			<td>Money</td>
			<td>
				<input type="text" readonly class="form-control-plaintext p-0" id="omoney" name="omoney" value="<?= ($omoney) ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">2</th>
			<td>Family Friends</td>
			<td>
				<input type="text" readonly class="form-control-plaintext p-0" id="ofriends" name="ofriends" value="<?= ($ofriends) ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">3</th>
			<td>Impossible Wants</td>
			<td>
				<input type="text" readonly class="form-control-plaintext p-0" id="owants" name="owants" value="<?= ($owants) ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">4</th>
			<td>Platinum Graves</td>
			<td>
				<input type="text" readonly class="form-control-plaintext p-0" id="ograves" name="ograves" value="<?= ($ograves) ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">5</th>
			<td>Business</td>
			<td>
				<input type="text" readonly class="form-control-plaintext p-0" id="obusiness" name="obusiness" value="<?= ($obusiness) ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">6</th>
			<td>Family Breed</td>
			<td>
				<input type="text" readonly class="form-control-plaintext p-0" id="opets" name="opets" value="<?= ($opets) ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">7</th>
			<td>Seasons</td>
			<td>
				<input type="text" readonly class="form-control-plaintext p-0" id="oseasons" name="oseasons" value="<?= ($oseasons) ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">8</th>
			<td>Collections</td>
			<td>
				<input type="text" readonly class="form-control-plaintext p-0" id="osets" name="osets" value="<?= ($osets) ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">9</th>
			<td>Handicaps</td>
			<td>
				<input type="text" readonly class="form-control-plaintext p-0" id="ohandicaps" name="ohandicaps" value="<?= ($ohandicaps) ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">10</th>
			<td>Less penalties</td>
			<td>
				<input type="text" readonly class="form-control-plaintext p-0" id="pnt" name="pnt" value="<?= ($penaltiestotal) ?>"/>
			</td>
		</tr>
		</tbody>
	</table>
</div>

<input type="hidden" name="ot" id="ot" value="<?= ($overflowtotal) ?>"/>
<div class="row">
	<div class="col">
		<p class="lead mt-3"><b>Sub total: <output id="overflowtotal" name="overflowtotal" for="ot"><span
			<?php if ($overflowtotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
			<?php if ($overflowtotal  > 0): ?>class="badge badge-success"<?php endif; ?>
			<?php if ($overflowtotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
			<?= ($overflowtotal)."
" ?>
			</span></output></b></p>
	</div>
	<div class="col">
		<p class="lead mt-3"><b>Free kachings: <output id="freekaching" name="freekaching" class="badge badge-secondary">
			<?= ($freekaching)."
" ?>
</output></b></p>
	</div>
</div>


<script>
    function omoneyChange(om) {
        let ofr = $("#ofriends").val();
        let ow = $("#owants").val();
        let ogv = $("#ograves").val();
        let ob = $("#obusiness").val();
        let op = $("#opets").val();
        let os = $("#oseasons").val();
        let oc = $("#osets").val();
        let oh = $("#ohandicaps").val();
		let pnt = $("#pnt").val();
		document.querySelector('#omoney').value = om;
        overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt);
    }

    function ofriendsChange(ofr) {
        let om = $("#omoney").val();
        let ow = $("#owants").val();
        let ogv = $("#ograves").val();
        let ob = $("#obusiness").val();
        let op = $("#opets").val();
        let os = $("#oseasons").val();
        let oc = $("#osets").val();
        let oh = $("#ohandicaps").val();
		let pnt = $("#pnt").val();
        document.querySelector('#ofriends').value = ofr;
        overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt);
    }

    function owantsChange(ow) {
        let om = $("#omoney").val();
        let ofr = $("#ofriends").val();
        let ogv = $("#ograves").val();
        let ob = $("#obusiness").val();
        let op = $("#opets").val();
        let os = $("#oseasons").val();
        let oc = $("#osets").val();
        let oh = $("#ohandicaps").val();
		let pnt = $("#pnt").val();
        document.querySelector('#owants').value = ow;
        overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt);
    }

    function ogravesChange(ogv) {
        let om = $("#omoney").val();
        let ofr = $("#ofriends").val();
        let ow = $("#owants").val();
        let ob = $("#obusiness").val();
        let op = $("#opets").val();
        let os = $("#oseasons").val();
        let oc = $("#osets").val();
        let oh = $("#ohandicaps").val();
		let pnt = $("#pnt").val();
        document.querySelector('#ograves').value = ogv;
        overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt);
    }

    function obusinessChange(ob) {
        let om = $("#omoney").val();
        let ofr = $("#ofriends").val();
        let ow = $("#owants").val();
        let ogv = $("#ograves").val();
        let op = $("#opets").val();
        let os = $("#oseasons").val();
        let oc = $("#osets").val();
        let oh = $("#ohandicaps").val();
		let pnt = $("#pnt").val();
        document.querySelector('#obusiness').value = ob;
        overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt);
    }

    function opetsChange(op) {
        let om = $("#omoney").val();
        let ofr = $("#ofriends").val();
        let ow = $("#owants").val();
        let ogv = $("#ograves").val();
        let ob = $("#obusiness").val();
        let os = $("#oseasons").val();
        let oc = $("#osets").val();
        let oh = $("#ohandicaps").val();
		let pnt = $("#pnt").val();
        document.querySelector('#opets').value = op;
        overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt);
    }

    function oseasonsChange(os) {
        let om = $("#omoney").val();
        let ofr = $("#ofriends").val();
        let ow = $("#owants").val();
        let ogv = $("#ograves").val();
        let ob = $("#obusiness").val();
        let op = $("#opets").val();
        let oc = $("#osets").val();
        let oh = $("#ohandicaps").val();
		let pnt = $("#pnt").val();
        document.querySelector('#oseasons').value = os;
        overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt);
    }

    function osetsChange(oc) {
        let om = $("#omoney").val();
        let ofr = $("#ofriends").val();
        let ow = $("#owants").val();
        let ogv = $("#ograves").val();
        let ob = $("#obusiness").val();
        let op = $("#opets").val();
        let os = $("#oseasons").val();
        let oh = $("#ohandicaps").val();
		let pnt = $("#pnt").val();
        document.querySelector('#osets').value = oc;
        overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt);
    }

    function ohandicapsChange(oh) {
		let om = $("#omoney").val();
		let ofr = $("#ofriends").val();
		let ow = $("#owants").val();
		let ogv = $("#ograves").val();
		let ob = $("#obusiness").val();
		let op = $("#opets").val();
		let os = $("#oseasons").val();
		let oc = $("#osets").val();
		let pnt = $("#pnt").val();
		document.querySelector('#ohandicaps').value = oh;
		overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt);
	}

	function pntChange(pnt) {
		let om = $("#omoney").val();
		let ofr = $("#ofriends").val();
		let ow = $("#owants").val();
		let ogv = $("#ograves").val();
		let ob = $("#obusiness").val();
		let op = $("#opets").val();
		let os = $("#oseasons").val();
		let oc = $("#osets").val();
		let oh = $("#ohandicaps").val();
		document.querySelector('#pnt').value = pnt;
		overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt);
	}

    function overflowSub(om, ofr, ow, ogv, ob, op, os, oc, oh, pnt) {
        let result = parseFloat(om) + parseFloat(ofr) + parseFloat(ow) + parseFloat(ogv) + parseFloat(ob) + parseFloat(op) + parseFloat(os) + parseFloat(oc) + parseFloat(oh) + parseFloat(pnt);

        if (result > 10) {
			let fk = result - 10;
            result = 10;
            $("#overflowtotal").val(result);
			$("#freekaching").val(fk);
            $("#ot").val(result);
        } else {
            $("#overflowtotal").val(result);
            $("#ot").val(result);
			$("#freekaching").val(0);
        }

        if (result == 0) {
            $('#overflowtotal').removeClass('badge badge-danger');
            $('#overflowtotal').removeClass('badge badge-success');
            $('#overflowtotal').addClass('badge badge-primary');
        }


        if (result > 0) {
            $('#overflowtotal').removeClass('badge badge-danger');
            $('#overflowtotal').removeClass('badge badge-primary');
            $('#overflowtotal').addClass('badge badge-success');
        }

        if (result < 0) {
            $('#overflowtotal').removeClass('badge badge-primary');
            $('#overflowtotal').removeClass('badge badge-success');
            $('#overflowtotal').addClass('badge badge-danger');
        }
    }

    function negText() {
		if ($("#omoney").val() < 0) {
			$("#omoney").addClass('text-danger');
		} else {
			$("#omoney").removeClass('text-danger');
		}
		if ($("#ofriends").val() < 0) {
			$("#ofriends").addClass('text-danger');
		} else {
			$("#ofriends").removeClass('text-danger');
		}
		if ($("#owants").val() < 0) {
			$("#owants").addClass('text-danger');
		} else {
			$("#owants").removeClass('text-danger');
		}
		if ($("#ograves").val() < 0) {
			$("#ograves").addClass('text-danger');
		} else {
			$("#ograves").removeClass('text-danger');
		}
		if ($("#obusiness").val() < 0) {
			$("#obusiness").addClass('text-danger');
		} else {
			$("#obusiness").removeClass('text-danger');
		}
		if ($("#opets").val() < 0) {
			$("#opets").addClass('text-danger');
		} else {
			$("#opets").removeClass('text-danger');
		}
		if ($("#oseasons").val() < 0) {
			$("#oseasons").addClass('text-danger');
		} else {
			$("#oseasons").removeClass('text-danger');
		}
		if ($("#osets").val() < 0) {
			$("#osets").addClass('text-danger');
		} else {
			$("#osets").removeClass('text-danger');
		}
		if ($("#ohandicaps").val() < 0) {
			$("#ohandicaps").addClass('text-danger');
		} else {
			$("#ohandicaps").removeClass('text-danger');
		}
		if ($("#pnt").val() < 0) {
			$("#pnt").addClass('text-danger');
		} else {
			$("#pnt").removeClass('text-danger');
		}
	}
</script>