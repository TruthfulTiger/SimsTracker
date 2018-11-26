<h3><?= ($cat) ?></h3>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <?php foreach (($handicaps?:[]) as $key=>$item): ?>
                <div class="custom-control custom-checkbox">
                    <label class="custom-control-label" for="<?= ($key) ?>"><?= ($item) ?></label>
                    <input type="checkbox" class="custom-control-input" name="<?= ($key) ?>" id="<?= ($key) ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<input type="hidden" name="ht" id="ht" value="<?= ($handicapstotal) ?>">
<p class="lead"><b>Sub total: <span id="handicapstotal"
    <?php if ($handicapstotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($handicapstotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($handicapstotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($handicapstotal)."
" ?>
    </span></b></p>