<h3><?= ($cat) ?> <a href="#" class="badge badge-pill badge-secondary title" data-toggle="collapse" data-target="#gravesHelp" aria-expanded="false" aria-controls="gravesHelp">
    ?</a>
    </a></h3>
<div class="collapse" id="gravesHelp">
    <div class="card card-body">
        <dt>From SimsLegacyChallenge.com</dt>
        <dd>This is a really simple category. You get half a point for every platinum grave that remains on the lot. It does not matter which aspiration the grave is, only that it is platinum. To gain a platinum grave, a sim must die of old age while in platinum.
            <br/><br/>
            Points earned over 10 carry over to the overflow category.
        </dd>
    </div>
</div>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="familycount">Family</label>
            <input type="number" class="form-control" min="0" oninput="familyChange(value)" value="<?= ($familycount) ?>" id="familycount" name="familycount"/>
        </div>
        <div class="form-group">
            <label for="wealthcount">Wealth</label>
            <input type="number" class="form-control" min="0" oninput="wealthChange(value)" value="<?= ($wealthcount) ?>" id="wealthcount" name="wealthcount"/>
        </div>
        <div class="form-group">
            <label for="knowledgecount">Knowledge</label>
            <input type="number" class="form-control" min="0" oninput="knowledgeChange(value)" value="<?= ($knowledgecount) ?>" id="knowledgecount" name="knowledgecount"/>
        </div>
        <div class="form-group">
            <label for="friendshipcount">Popularity</label>
            <input type="number" class="form-control" min="0" oninput="friendshipChange(value)" value="<?= ($friendshipcount) ?>" id="friendshipcount" name="friendshipcount"/>
        </div>
        <div class="form-group">
            <label for="romancecount">Romance</label>
            <input type="number" class="form-control" min="0" oninput="romanceChange(value)" value="<?= ($romancecount) ?>" id="romancecount" name="romancecount"/>
        </div>
        <div class="form-group">
            <label for="pleasurecount">Pleasure</label>
            <input type="number" class="form-control" min="0" oninput="pleasureChange(value)" value="<?= ($pleasurecount) ?>" id="pleasurecount" name="pleasurecount"/>
        </div>
        <div class="form-group">
            <label for="cheesecount">Grilled Cheese</label>
            <input type="number" class="form-control" min="0" oninput="cheeseChange(value)" value="<?= ($cheesecount) ?>" id="cheesecount" name="cheesecount"/>
        </div>
    </div>
</div>
<input type="hidden" name="gvt" id="gvt" value="<?= ($gravestotal) ?>">
<p class="lead mt-3"><b>Sub total: <output id="gravestotal" name="gravestotal" for="gvt">
    <span
    <?php if ($gravestotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($gravestotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($gravestotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($gravestotal)."
" ?>
  </span></output></b></p>

<script>
    function familyChange(fa) {
        let w = $("#wealthcount").val();
        let k = $("#knowledgecount").val();
        let fr = $("#friendshipcount").val();
        let r = $("#romancecount").val();
        let p = $("#pleasurecount").val();
        let c = $("#cheesecount").val();
        document.querySelector('#familycount').value = fa;
        gravesSub(fa, w, k, fr, r, p, c);
    }

    function wealthChange(w) {
        let fa = $("#familycount").val();
        let k = $("#knowledgecount").val();
        let fr = $("#friendshipcount").val();
        let r = $("#romancecount").val();
        let p = $("#pleasurecount").val();
        let c = $("#cheesecount").val();
        document.querySelector('#wealthcount').value = w;
        gravesSub(fa, w, k, fr, r, p, c);
    }

    function knowledgeChange(k) {
        let fa = $("#familycount").val();
        let w = $("#wealthcount").val();
        let fr = $("#friendshipcount").val();
        let r = $("#romancecount").val();
        let p = $("#pleasurecount").val();
        let c = $("#cheesecount").val();
        document.querySelector('#knowledgecount').value = k;
        gravesSub(fa, w, k, fr, r, p, c);
    }

    function friendshipChange(fr) {
        let fa = $("#familycount").val();
        let k = $("#knowledgecount").val();
        let w = $("#wealthcount").val();
        let r = $("#romancecount").val();
        let p = $("#pleasurecount").val();
        let c = $("#cheesecount").val();
        document.querySelector('#friendshipcount').value = fr;
        gravesSub(fa, w, k, fr, r, p, c);
    }

    function romanceChange(r) {
        let fa = $("#familycount").val();
        let k = $("#knowledgecount").val();
        let fr = $("#friendshipcount").val();
        let w = $("#wealthcount").val();
        let p = $("#pleasurecount").val();
        let c = $("#cheesecount").val();
        document.querySelector('#romancecount').value = r;
        gravesSub(fa, w, k, fr, r, p, c);
    }

    function pleasureChange(p) {
        let fa = $("#familycount").val();
        let k = $("#knowledgecount").val();
        let fr = $("#friendshipcount").val();
        let r = $("#romancecount").val();
        let w = $("#wealthcount").val();
        let c = $("#cheesecount").val();
        document.querySelector('#pleasurecount').value = p;
        gravesSub(fa, w, k, fr, r, p, c);
    }

    function cheeseChange(c) {
        let fa = $("#familycount").val();
        let k = $("#knowledgecount").val();
        let fr = $("#friendshipcount").val();
        let r = $("#romancecount").val();
        let p = $("#pleasurecount").val();
        let w = $("#wealthcount").val();
        document.querySelector('#cheesecount').value = c;
        gravesSub(fa, w, k, fr, r, p, c);
    }

    function gravesSub(fa, w, k, fr, r, p, c) {
        let result = (fa * 0.5) + (w * 0.5) +(k * 0.5) + (fr * 0.5) + (r * 0.5) + (p * 0.5) + (c * 0.5);

        if (result > 10) {
			let o = result - 10;
			result = 10;
            $("#ograves").val(o);
            ogravesChange(o);
        } else {
            $("#ograves").val(0);
            ogravesChange(0);
        }
		$("#gravestotal").val(result);
		$("#gvt").val(result);

        if (result == 0) {
            $('#gravestotal').removeClass('badge badge-danger');
            $('#gravestotal').removeClass('badge badge-success');
            $('#gravestotal').addClass('badge badge-primary');
        }


        if (result > 0) {
            $('#gravestotal').removeClass('badge badge-danger');
            $('#gravestotal').removeClass('badge badge-primary');
            $('#gravestotal').addClass('badge badge-success');
        }

        if (result < 0) {
            $('#gravestotal').removeClass('badge badge-primary');
            $('#gravestotal').removeClass('badge badge-success');
            $('#gravestotal').addClass('badge badge-danger');
        }
    }
</script>