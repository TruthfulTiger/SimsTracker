<div class="nav-scroller position-fixed bg-white shadow-sm w-100">
	<div class="container">
		<nav class="nav nav-underline">
			<?php foreach (($account?:[]) as $acckey=>$accitem): ?>
				<a href="<?= ($BASE) ?><?= ($acckey) ?>"
				<?php if ($title == $accitem): ?>
					
						class="nav-link active"
					
					<?php else: ?>
						class="nav-link"
					
				<?php endif; ?>
				><?= ($accitem) ?> <?php if ($title == $accitem): ?><span class="sr-only">(current)</span><?php endif; ?></a>
			<?php endforeach; ?>
		</nav>
	</div>
</div>

