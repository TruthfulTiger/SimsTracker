<h3><?= ($cat) ?></h3>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <?php foreach (($master?:[]) as $key=>$item): ?>
                <div class="custom-control custom-checkbox">
                    <label class="custom-control-label" for="<?= ($key) ?>"><?= ($item) ?></label>
                    <input type="checkbox" class="custom-control-input" name="<?= ($key) ?>" id="<?= ($key) ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<input type="hidden" name="mat" id="mat" value="<?= ($mastertotal) ?>">
<p class="lead"><b>Sub total: <span id="mastertotal"
    <?php if ($mastertotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($mastertotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($mastertotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($mastertotal)."
" ?>
    </span></b></p>