<h3><?= ($cat) ?></h3>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="tree">Legacy Tree has survived this many generations</label>
            <input type="number" class="form-control" id="tree" value="0" name="tree"/>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <label class="custom-control-label" for="fish">Every fishable item and wishing well</label>
                <input type="checkbox" class="custom-control-input" name="fish" id="fish">
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <label class="custom-control-label" for="juice">Every kind of juice</label>
                <input type="checkbox" class="custom-control-input" name="juice" id="juice">
            </div>
        </div>
    </div>
</div>
<p class="lead"><b>Sub total: <span id="seasonstotal"
    <?php if ($seasonstotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($seasonstotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($seasonstotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($seasonstotal)."
" ?>
    </span></b></p>