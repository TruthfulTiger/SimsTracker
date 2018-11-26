<h3><?= ($cat) ?> <a href="#" class="badge badge-pill badge-secondary title" data-toggle="collapse" data-target="#gravesHelp" aria-expanded="false" aria-controls="gravesHelp">
    ?</a>
    </a></h3>
<div class="collapse" id="gravesHelp">
    <div class="card card-body">
        <dt>From SimsLegacyChallenge.com</dt>
        <dd>You gain 1 point for every generation the “Family Business” is a level 10 business.
            <br/><br/>
            The “Family Business” is defined as the very first business opened by the founder or heir of the legacy family. This may be a home-based or community lot business.
            <br/><br/>
            The business will only start earning the family points once it becomes a level 10 business.
            <br/><br/>
            If more than one generation is alive once the business becomes a level 10, it only counts for the youngest generation. (For example: In order for the business to earn the family 10 points for 10 generations, the founder would have to get it to a level 10 business before the 2nd generation was even born)
            <br/><br/>
            In addition, any sim that dies a platinum death with all 7 gold talent badges will earn 1 point in this category.
            <br/><br/>
            Points earned over 10 carry over to the overflow category.
        </dd>
    </div>
</div>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="busgens">Level 10 Family Business Generations</label>
            <input type="number" min="0" class="form-control" oninput="gensChange(value)" value="<?= ($busgens) ?>" id="busgens" name="busgens"/>
        </div>
        <div class="form-group">
            <label for="badgecount">Sims with all 7 Gold Talent Badges</label>
            <input type="number" min="0" class="form-control" oninput="badgeChange(value)" value="<?= ($badgecount) ?>" id="badgecount" name="badgecount"/>
        </div>
    </div>
</div>
<input type="hidden" name="bt" id="bt" value="<?= ($biztotal) ?>">
<p class="lead mt-3"><b>Sub total: <output id="biztotal" name="biztotal" for="bt"><span
    <?php if ($biztotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($biztotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($biztotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($biztotal)."
" ?>
    </span></output></b></p>

<script>
    function gensChange(g) {
        let b = $("#badgecount").val();
        document.querySelector('#busgens').value = g;
        bizSub(g, b);
    }

    function badgeChange(b) {
        let g = $("#busgens").val();
        document.querySelector('#badgecount').value = b;
        bizSub(g, b);
    }

    function bizSub(g, b) {
        let result = parseInt(g) + parseInt(b);

        if (result > 10) {
            let o = result - 10;
			result = 10;
            $("#obusiness").val(o);
            obusinessChange(o);
        } else {
            $("#obusiness").val(0);
            obusinessChange(0);
        }
		$("#biztotal").val(result);
		$("#bt").val(result);

        if (result == 0) {
            $('#biztotal').removeClass('badge badge-danger');
            $('#biztotal').removeClass('badge badge-success');
            $('#biztotal').addClass('badge badge-primary');
        }


        if (result > 0) {
            $('#biztotal').removeClass('badge badge-danger');
            $('#biztotal').removeClass('badge badge-primary');
            $('#biztotal').addClass('badge badge-success');
        }

        if (result < 0) {
            $('#biztotal').removeClass('badge badge-primary');
            $('#biztotal').removeClass('badge badge-success');
            $('#biztotal').addClass('badge badge-danger');
        }
    }
</script>