<h3><?= ($cat) ?></h3>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="kaching">Kaching</label>
            <input type="number" min="0" class="form-control" oninput="kachingChange(value)" id="kaching" value="<?= ($kaching) ?>" name="kaching"/>
        </div>
        <div class="form-group">
            <label for="shrink">Sim Shrink Visit</label>
            <input type="number" min="0" class="form-control" id="shrink" oninput="shrinkChange(value)" value="<?= ($shrink) ?>" name="shrink"/>
        </div>
        <div class="form-group">
            <label for="sw">Child Taken By Social Worker</label>
            <input type="number" min="0" class="form-control" id="sw" oninput="swChange(value)" value="<?= ($sw) ?>" name="sw"/>
        </div>
        <div class="form-group">
            <label for="repo">Visit From Repo Man</label>
            <input type="number" min="0" class="form-control" id="repo" oninput="repoChange(value)" value="<?= ($repo) ?>" name="repo"/>
        </div>
        <div class="form-group">
            <label for="dropout">Expelled/Dropped Out Of College</label>
            <input type="number" min="0" class="form-control" id="dropout" oninput="dropoutChange(value)" value="<?= ($dropout) ?>" name="dropout"/>
        </div>
        <div class="form-group">
            <label for="visitordeath">Visitor Dies</label>
            <input type="number" min="0" class="form-control" id="visitordeath" oninput="visitordeathChange(value)" value="<?= ($visitordeath) ?>" name="visitordeath"/>
        </div>
        <div class="form-group">
            <label for="diva">Diva/Mr Big Moves In</label>
            <input type="number" min="0" class="form-control" id="diva" oninput="divaChange(value)" value="<?= ($diva) ?>" name="diva"/>
        </div>
        <div class="form-group">
        <label for="reload">Game Reload</label>
        <input type="number" min="0" class="form-control" id="reload" oninput="reloadChange(value)" value="<?= ($reload) ?>" name="reload"/>
    </div>
        <div class="form-group">
            <label for="aspchange">Aspiration Change (not Grilled Cheese)</label>
            <input type="number" min="0" class="form-control" id="aspchange" oninput="aspChange(value)" value="<?= ($aspchange) ?>" name="aspchange"/>
        </div>
        <div class="form-group">
            <label for="neglect">Animal Taken Due To Neglect</label>
            <input type="number" min="0" class="form-control" id="neglect" oninput="neglectChange(value)" value="<?= ($neglect) ?>" name="neglect"/>
        </div>
        <div class="form-group">
            <label for="runaway">Animal That Runs Away</label>
            <input type="number" min="0" class="form-control" id="runaway" oninput="runawayChange(value)" value="<?= ($runaway) ?>" name="runaway"/>
        </div>
        <div class="form-group">
            <label for="retrieved">Animal That Runs Away, But Later Retrieved</label>
            <input type="number" min="0" class="form-control" id="retrieved" oninput="retrievedChange(value)" value="<?= ($retrieved) ?>" name="retrieved"/>
        </div>
        <div class="form-group">
            <label for="badvacation">Bad Vacation Memory</label>
            <input type="number" min="0" class="form-control" id="badvacation" oninput="badvacationChange(value)" value="<?= ($badvacation) ?>" name="badvacation"/>
        </div>
    </div>
</div>

<p class="lead mt-3"><b>Sub total: <output id="penaltiestotal" name="penaltiestotal" for="pnt"><span
    <?php if ($penaltiestotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($penaltiestotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($penaltiestotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($penaltiestotal)."
" ?>
   </span></output></b></p>
<script>
    function kachingChange(k) {
        let s = $("#shrink").val();
        let sw = $("#sw").val();
        let rm = $("#repo").val();
        let d = $("#dropout").val();
        let v = $("#visitordeath").val();
        let dv = $("#diva").val();
        let r = $("#reload").val();
        let a = $("#aspchange").val();
        let n = $("#neglect").val();
        let rw = $("#runaway").val();
        let rt = $("#retrieved").val();
        let bv = $("#badvacation").val();
        document.querySelector('#kaching').value = k;
        penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
    }

	function shrinkChange(s) {
		let k = $("#kaching").val();
		let sw = $("#sw").val();
		let rm = $("#repo").val();
		let d = $("#dropout").val();
		let v = $("#visitordeath").val();
		let dv = $("#diva").val();
		let r = $("#reload").val();
		let a = $("#aspchange").val();
		let n = $("#neglect").val();
		let rw = $("#runaway").val();
		let rt = $("#retrieved").val();
		let bv = $("#badvacation").val();
		document.querySelector('#shrink').value = s;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function swChange(sw) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let rm = $("#repo").val();
		let d = $("#dropout").val();
		let v = $("#visitordeath").val();
		let dv = $("#diva").val();
		let r = $("#reload").val();
		let a = $("#aspchange").val();
		let n = $("#neglect").val();
		let rw = $("#runaway").val();
		let rt = $("#retrieved").val();
		let bv = $("#badvacation").val();
		document.querySelector('#sw').value = sw;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function repoChange(rm) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let sw = $("#sw").val();
		let d = $("#dropout").val();
		let v = $("#visitordeath").val();
		let dv = $("#diva").val();
		let r = $("#reload").val();
		let a = $("#aspchange").val();
		let n = $("#neglect").val();
		let rw = $("#runaway").val();
		let rt = $("#retrieved").val();
		let bv = $("#badvacation").val();
		document.querySelector('#repo').value = rm;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function dropoutChange(d) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let sw = $("#sw").val();
		let rm = $("#repo").val();
		let v = $("#visitordeath").val();
		let dv = $("#diva").val();
		let r = $("#reload").val();
		let a = $("#aspchange").val();
		let n = $("#neglect").val();
		let rw = $("#runaway").val();
		let rt = $("#retrieved").val();
		let bv = $("#badvacation").val();
		document.querySelector('#dropout').value = d;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function visitordeathChange(v) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let sw = $("#sw").val();
		let rm = $("#repo").val();
		let d = $("#dropout").val();
		let dv = $("#diva").val();
		let r = $("#reload").val();
		let a = $("#aspchange").val();
		let n = $("#neglect").val();
		let rw = $("#runaway").val();
		let rt = $("#retrieved").val();
		let bv = $("#badvacation").val();
		document.querySelector('#visitordeath').value = v;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function divaChange(dv) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let sw = $("#sw").val();
		let rm = $("#repo").val();
		let d = $("#dropout").val();
		let v = $("#visitordeath").val();
		let r = $("#reload").val();
		let a = $("#aspchange").val();
		let n = $("#neglect").val();
		let rw = $("#runaway").val();
		let rt = $("#retrieved").val();
		let bv = $("#badvacation").val();
		document.querySelector('#diva').value = dv;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function reloadChange(r) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let sw = $("#sw").val();
		let rm = $("#repo").val();
		let d = $("#dropout").val();
		let v = $("#visitordeath").val();
		let dv = $("#diva").val();
		let a = $("#aspchange").val();
		let n = $("#neglect").val();
		let rw = $("#runaway").val();
		let rt = $("#retrieved").val();
		let bv = $("#badvacation").val();
		document.querySelector('#reload').value = r;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function aspChange(a) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let sw = $("#sw").val();
		let rm = $("#repo").val();
		let d = $("#dropout").val();
		let v = $("#visitordeath").val();
		let dv = $("#diva").val();
		let r = $("#reload").val();
		let n = $("#neglect").val();
		let rw = $("#runaway").val();
		let rt = $("#retrieved").val();
		let bv = $("#badvacation").val();
		document.querySelector('#aspchange').value = a;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function neglectChange(n) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let sw = $("#sw").val();
		let rm = $("#repo").val();
		let d = $("#dropout").val();
		let v = $("#visitordeath").val();
		let dv = $("#diva").val();
		let r = $("#reload").val();
		let a = $("#aspchange").val();
		let rw = $("#runaway").val();
		let rt = $("#retrieved").val();
		let bv = $("#badvacation").val();
		document.querySelector('#neglect').value = n;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function runawayChange(rw) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let sw = $("#sw").val();
		let rm = $("#repo").val();
		let d = $("#dropout").val();
		let v = $("#visitordeath").val();
		let dv = $("#diva").val();
		let r = $("#reload").val();
		let a = $("#aspchange").val();
		let n = $("#neglect").val();
		let rt = $("#retrieved").val();
		let bv = $("#badvacation").val();
		document.querySelector('#runaway').value = rw;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function retrievedChange(rt) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let sw = $("#sw").val();
		let rm = $("#repo").val();
		let d = $("#dropout").val();
		let v = $("#visitordeath").val();
		let dv = $("#diva").val();
		let r = $("#reload").val();
		let a = $("#aspchange").val();
		let n = $("#neglect").val();
		let rw = $("#runaway").val();
		let bv = $("#badvacation").val();
		document.querySelector('#retrieved').value = rt;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

	function badvacationChange(bv) {
		let k = $("#kaching").val();
		let s = $("#shrink").val();
		let sw = $("#sw").val();
		let rm = $("#repo").val();
		let d = $("#dropout").val();
		let v = $("#visitordeath").val();
		let dv = $("#diva").val();
		let r = $("#reload").val();
		let a = $("#aspchange").val();
		let n = $("#neglect").val();
		let rw = $("#runaway").val();
		let rt = $("#retrieved").val();
		document.querySelector('#badvacation').value = bv;
		penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv);
	}

    function penaltiesSub(k, s, sw, rm, d, v, dv, r, a, n, rw, rt, bv) {
        let result = (parseFloat(k) * -1) + (parseFloat(s) * -1) + (parseFloat(sw) * -1) + (parseFloat(rm) * -1) + (parseFloat(d) * -1) + (parseFloat(v) * -1) + (parseFloat(dv) * -1) + (parseFloat(r) * -1) + (parseFloat(a) * -1) + (parseFloat(n) * -1) + (parseFloat(rw) * -1) + (parseFloat(rt) * -0.5) + (parseFloat(bv) * -1);

        $("#penaltiestotal").val(result);
        $("#pnt").val(result);
		pntChange(result);

        if (result == 0) {
            $('#penaltiestotal').removeClass('badge badge-danger');
            $('#penaltiestotal').removeClass('badge badge-success');
            $('#penaltiestotal').addClass('badge badge-primary');
        }


        if (result > 0) {
            $('#penaltiestotal').removeClass('badge badge-danger');
            $('#penaltiestotal').removeClass('badge badge-primary');
            $('#penaltiestotal').addClass('badge badge-success');
        }

        if (result < 0) {
            $('#penaltiestotal').removeClass('badge badge-primary');
            $('#penaltiestotal').removeClass('badge badge-success');
            $('#penaltiestotal').addClass('badge badge-danger');
        }
    }
</script>