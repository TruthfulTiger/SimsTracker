<h3><?= ($cat) ?> <a href="#" class="badge badge-pill badge-secondary title" data-toggle="collapse" data-target="#moneyHelp" aria-expanded="false" aria-controls="moneyHelp">
    ?</a>
    </a></h3>
<div class="collapse" id="moneyHelp">
    <div class="card card-body">
        <dt>From SimsLegacyChallenge.com</dt>
        <dd>You get one point for every §100,000 plus §50,000 for every Expansion Pack you have installed (So a person with all three packs installed would have to earn §250,000 for every money point). There are so many new ways to make money in the game that inflation has set in. The upside is that you may still round up, so you always start with at least 1 legacy point for money. Secondly, there is no more ‘college penalty’ you can move sims back from college with no penalty. The only caveat is that they must have gone all the way through college. The value of owned community lots is added to the household net worth for the purpose of this score. Once the amount earned per point is at §300,000 do not keep adding §50,000 per EP, §300,000 is the max simoleans earned per point.<br/><br/>Points over 10 carry over to the overflow category.</dd>
    </div>
</div>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="money">Family net worth</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="simoleans">§</span>
                </div>
                <input type="number" id="money" min="0" name="money" value="<?= ($money) ?>" oninput="moneyChange(value)" class="form-control" aria-label="money" aria-describedby="money">
                <input type="hidden" name="mt" id="mt" value="<?= ($moneytotal) ?>">
            </div>
        </div>
    </div>
</div>
    <p class="lead mt-3"><b>Sub total: <output id="moneytotal" name="moneytotal" for="mt"><span
        <?php if ($moneytotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
        <?php if ($moneytotal  > 0): ?>class="badge badge-success"<?php endif; ?>
        <?php if ($moneytotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
        <?= ($moneytotal)."
" ?>
        </span></output></b></p>

<script>
    function moneyChange(n) {
        let moneypoints = <?= ($moneypoints) ?>;
        let moneycount = (n/moneypoints)*1;

        let result = Math.ceil(moneycount);
        if (result > 10) {
			let o = result - 10;
			result = 10;
            $("#omoney").val(o);
            omoneyChange(o);
        } else {
            $("#omoney").val(0);
            omoneyChange(0);
        }
		$("#moneytotal").val(result);
		$("#mt").val(result);

        if (result == 0) {
            $('#moneytotal').removeClass('badge badge-danger');
            $('#moneytotal').removeClass('badge badge-success');
            $('#moneytotal').addClass('badge badge-primary');
        }


        if (result > 0) {
            $('#moneytotal').removeClass('badge badge-danger');
            $('#moneytotal').removeClass('badge badge-primary');
            $('#moneytotal').addClass('badge badge-success');
        }

        if (result < 0) {
            $('#moneytotal').removeClass('badge badge-primary');
            $('#moneytotal').removeClass('badge badge-success');
            $('#moneytotal').addClass('badge badge-danger');
        }
    }
</script>