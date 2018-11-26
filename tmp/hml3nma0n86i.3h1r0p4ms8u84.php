<h3><?= ($cat) ?></h3>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="casfounder" id="casfounder">
                <label class="custom-control-label" for="casfounder">Founder is custom animal</label>
            </div>
        </div>
        <div class="form-group">
            <label for="adopted">Adopted mates</label>
            <input type="number" class="form-control" id="adopted" value="0" name="adopted"/>
        </div>
        <div class="form-group">
            <label for="other">Mates brought in by other means</label>
            <input type="number" class="form-control" id="other" value="0" name="other"/>
        </div>
        <div class="form-group">
            <label for="topbilling">Heirs that have learned all skills and peaked career</label>
            <input type="number" class="form-control" id="topbilling" value="0" name="topbilling"/>
        </div>
    </div>
</div>
<input type="hidden" name="pt" id="pt" value="<?= ($petstotal) ?>">
<p class="lead"><b>Sub total: <span id="petstotal"
    <?php if ($petstotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($petstotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($petstotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($petstotal)."
" ?>
    </span></b></p>