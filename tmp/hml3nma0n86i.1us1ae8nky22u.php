<h3><?= ($cat) ?></h3>
<div class="form-row">
    <div class="col">
        <div class="form-group custom-control custom-checkbox">
            <?php foreach (($ghosts?:[]) as $key=>$ghost): ?>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="<?= ($key) ?>" id="<?= ($key) ?>">
                    <label class="custom-control-label" for="<?= ($key) ?>"><?= ($ghost) ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<input type="hidden" name="ght" id="ght" value="<?= ($ghoststotal) ?>">
<p class="lead"><b>Sub total: <span id="ghoststotal"
    <?php if ($ghoststotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($ghoststotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($ghoststotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($ghoststotal)."
" ?>
    </span></b></p>