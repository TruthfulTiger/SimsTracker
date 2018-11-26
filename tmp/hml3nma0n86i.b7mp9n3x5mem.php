<h3><?= ($cat) ?></h3>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="alienpreg">Alien Pregnancies</label>
            <input type="number" class="form-control" id="alienpreg" value="0" name="alienpreg"/>
        </div>
        <div class="form-group">
            <label for="platgraves">Platinum Grave Sets</label>
            <input type="number" class="form-control" id="platgraves" value="0" name="platgraves"/>
        </div>
        <div class="form-group">
            <label for="elixirs">Sets of 25 Unused Elixirs</label>
            <input type="number" class="form-control" id="elixirs" value="0" name="elixirs"/>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <label class="custom-control-label" for="allwants">All Impossible Wants</label>
                <input type="checkbox" class="custom-control-input" name="allwants" id="allwants">
            </div>
            <div class="custom-control custom-checkbox">
                <label class="custom-control-label" for="allbugs">Complete Bug Collection</label>
                <input type="checkbox" class="custom-control-input" name="allbugs" id="allbugs">
            </div>
            <div class="custom-control custom-checkbox">
                <label class="custom-control-label" for="allhobbies">Complete Set of Hobby Awards</label>
                <input type="checkbox" class="custom-control-input" name="allhobbies" id="allhobbies">
            </div>
            <div class="custom-control custom-checkbox">
                <label class="custom-control-label" for="allcareers">Complete Set of Career Rewards</label>
                <input type="checkbox" class="custom-control-input" name="allcareers" id="allcareers">
            </div>
        </div>
    </div>
</div>
<p class="lead"><b>Sub total: <span id="setstotal"
    <?php if ($setstotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($setstotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($setstotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($setstotal)."
" ?>
    </span></b></p>