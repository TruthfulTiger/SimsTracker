</div>
</div>
</div>
</main>
<footer class="footer text-light shadow-sm">
    <div class="container-fluid">
		<div class="container">
	This site is not endorsed by or affiliated with Electronic Arts, or its licensors. Trademarks are the property of their respective owners. Game content and materials copyright Electronic Arts Inc. and its licensors. All Rights Reserved. Site built by Sam Phoenix &copy;
		<?php if ($copyyear == 2018): ?>
			<?= ($copyyear) ?>
			<?php else: ?>2018 - <?= ($copyyear) ?>
		<?php endif; ?>
		</div>
    </div>
</footer>
<?php echo $this->render('login.html',NULL,get_defined_vars(),0); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="<?= ($BASE) ?>/ui/js/jquery-simple-validator.min.js"></script>
<script src="<?= ($BASE) ?>/node_modules/bootstrap-confirmation2/dist/bootstrap-confirmation.js"></script>
<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		'use strict';

		$('[data-toggle="offcanvas"]').on('click', function () {
			$('.offcanvas-collapse').toggleClass('open')
		})
	});
	$('[data-toggle=confirmation]').confirmation({
		rootSelector: '[data-toggle=confirmation]'
		// other options
	});
</script>
<?php echo $this->render('messages.html',NULL,get_defined_vars(),0); ?>

</html>
