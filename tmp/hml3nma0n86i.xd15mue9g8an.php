<p class="lead mb-3">Keep track of your legacy challenge here. For the official rules, visit <a href="https://www.simslegacychallenge.com/legacy-challenge-rules/sims-2-legacy-challenge-rules-advanced/" target="_blank">www.simslegacychallenge.com</a> </p>
<form method="post" action="<?= ($BASE) ?>/legacy/save">
    <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-summary-tab" data-toggle="pill" href="#v-pills-summary" role="tab" aria-controls="v-pills-summary" aria-selected="true">Summary</a>
                    <?php foreach (($legacycats?:[]) as $lkey=>$cat): ?>
                            <a class="nav-link" onclick="negText()" id="v-pills-<?= ($lkey) ?>-tab" data-toggle="pill" href="#v-pills-<?= ($lkey) ?>" role="tab" aria-controls="v-pills-<?= ($lkey) ?>" aria-selected="false"><?= ($cat) ?></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-summary" role="tabpanel" aria-labelledby="v-pills-summary-tab">
                        <?php echo $this->render('views/legacyscores/summary.html',NULL,get_defined_vars(),0); ?>
                    </div>

                    <?php foreach (($legacycats?:[]) as $lkey=>$cat): ?>
                    <div class="tab-pane fade" id="v-pills-<?= ($lkey) ?>" role="tabpanel" aria-labelledby="v-pills-<?= ($lkey) ?>-tab">
                        <?php if ($lkey == 'legacy') echo $this->render('views/legacyscores/core.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'money') echo $this->render('views/legacyscores/money.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'friends') echo $this->render('views/legacyscores/friends.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'wants') echo $this->render('views/legacyscores/wants.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'graves') echo $this->render('views/legacyscores/graves.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'ghosts') echo $this->render('views/legacyscores/ghosts.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'business') echo $this->render('views/legacyscores/business.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'pets') echo $this->render('views/legacyscores/pets.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'seasons') echo $this->render('views/legacyscores/seasons.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'bv') echo $this->render('views/legacyscores/bv.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'ft') echo $this->render('views/legacyscores/ft.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'sets') echo $this->render('views/legacyscores/collections.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'master') echo $this->render('views/legacyscores/master.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'handicaps') echo $this->render('views/legacyscores/handicaps.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'overflow') echo $this->render('views/legacyscores/overflow.html',NULL,get_defined_vars(),0); ?>
                        <?php if ($lkey == 'penalties') echo $this->render('views/legacyscores/penalties.html',NULL,get_defined_vars(),0); ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <input type="text" class="hptrap" />
                <button class="btn btn-primary mb-5" name="save" id="save" type="submit">Save</button>
            </div>
        </div>
</form>
