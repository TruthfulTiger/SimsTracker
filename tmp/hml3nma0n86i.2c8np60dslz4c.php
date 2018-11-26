<h3><?= ($cat) ?></h3>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="mementos">Amount of mementos</label>
            <input type="number" class="form-control" min="0" max="45" id="mementos" value="<?= ($mementototal) ?>" name="mementos"/>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="1" name="vhome" id="vhome"/>
                <label class="custom-control-label" for="vhome">Bought and holidayed at Vacation Home</label>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="1" name="vhfounder" id="vhfounder" />
                <label class="custom-control-label" for="vhfounder">Vacation Home bought by Founder</label>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="1" name="souvenirs" id="souvenirs" <?php if ($souvenirs == 1): ?>checked<?php endif; ?>/>
                <label class="custom-control-label" for="souvenirs">Every souvenir is displayed in home</label>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="bvt" id="bvt" value="<?= ($bvtotal) ?>">
<p class="lead"><b>Sub total: <span id="bvtotal"
    <?php if ($bvtotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($bvtotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($bvtotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($bvtotal)."
" ?>
    </span></b></p>