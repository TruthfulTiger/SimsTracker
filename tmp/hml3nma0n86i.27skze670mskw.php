<h3><?= ($cat) ?> <a href="#" class="badge badge-pill badge-secondary title" data-toggle="collapse" data-target="#legacyHelp" aria-expanded="false" aria-controls="legacyHelp">
    ?</a>
    </a></h3>
<div class="collapse" id="legacyHelp">
    <div class="card card-body">
        <dt>From SimsLegacyChallenge.com</dt>
        <dd>The heart of the challenge, this category will slowly earn points just for producing the generations. You can double the worth of an heir by painting a portrait of them and having it hanging somewhere on the lot. Portraits must be painted while the sim is alive. Because the challenge ends the moment the 10th generation is born, you obviously cannot paint a portrait of the 10th generation baby. For that reason, the 10th generation earns a full point when born.</dd>
    </div>
</div>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="generation">Current generation:  <output for="generation" id="currentgen">1</output></label>
            <input type="range" class="custom-range" min="1" max="10" step="1" value="<?= ($generation) ?>" class="form-control-range" name="generation" id="generation" oninput="outputUpdate(value)">
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col">
        <div class="form-group">
            <label for="portraits">Generations with portrait </label>
            <input type="number" id="portraits" min="0" max="9" step="1" name="portraits" value="<?= ($portraits) ?>" oninput="portraitChange(value)" class="form-control" aria-label="portraits" aria-describedby="portraits">
        </div>
    </div>
</div>
<input type="hidden" name="lt" id="lt" value="<?= ($legacytotal) ?>">
<p class="lead"><b>Sub total: <output id="legacytotal" name="legacytotal" for="lt"> <span
    <?php if ($legacytotal  == 0): ?>class="badge badge-primary"<?php endif; ?>
    <?php if ($legacytotal  > 0): ?>class="badge badge-success"<?php endif; ?>
    <?php if ($legacytotal  < 0): ?>class="badge badge-danger"<?php endif; ?>>
    <?= ($legacytotal)."
" ?>
    </span></output></b></p>

<script>
    function outputUpdate(gen) {
        let p = $("#portraits").val();
        document.querySelector('#currentgen').value = gen;
        legacySub(gen, p);
    }

    function portraitChange(p) {
        let gen = $("#currentgen").val();
        document.querySelector('#portraits').value = p;
        legacySub(gen, p);
    }

    function legacySub(g, p) {
        let n = p * 0.5;

        if (g < 10) {
            $("#legacytotal").val((g * 0.5) + n);
        }
        else {
            $("#legacytotal").val(((g * 0.5)+0.5) + n);
        }

        n = $("#legacytotal").val();
        $("#lt").val(n);
		gtChange();

        if (n == 0) {
            $('#legacytotal').removeClass('badge badge-danger');
            $('#legacytotal').removeClass('badge badge-success');
            $('#legacytotal').addClass('badge badge-primary');
        }


        if (n > 0) {
            $('#legacytotal').removeClass('badge badge-danger');
            $('#legacytotal').removeClass('badge badge-primary');
            $('#legacytotal').addClass('badge badge-success');
        }

        if (n < 0) {
            $('#legacytotal').removeClass('badge badge-primary');
            $('#legacytotal').removeClass('badge badge-success');
            $('#legacytotal').addClass('badge badge-danger');
        }
    }
</script>