<h3><?= ($cat) ?></h3>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="familyhobby">Family Hobby</label>
            <select class="custom-select" name="familyhobby" id="familyhobby">
                <?php foreach (($hobbies?:[]) as $key=>$hobby): ?>
                    <option value="hobby<?= ($key) ?>"><?= ($hobby) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="fhmax">Number of Sims to max Family Hobby</label>
            <input type="number" class="form-control" id="fhmax" value="0" name="fhmax"/>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <label class="custom-control-label" for="pdhobby">Family Hobby is Founder's Pre-Destined Hobby</label>
                <input type="checkbox" class="custom-control-input" name="pdhobby" id="pdhobby">
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="ftt" id="ftt" value="<?= ($fttotal) ?>">
<p class="lead"><b>Sub total: <span id="fttotal"
    <?php if ($fttotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($fttotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($fttotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($fttotal)."
" ?>
    </span></b></p>