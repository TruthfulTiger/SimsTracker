<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
		<div class="container">
        <a class="navbar-brand mb-0 h1 title" href="#">Sims Tracker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
				<?php foreach (($menu?:[]) as $mkey=>$item): ?>
					<li <?php if ($title == $item): ?>
					
						class="nav-item active"
					
					<?php else: ?>
						class="nav-item"
					
				<?php endif; ?>
					>
					<a href="<?= ($BASE) ?><?= ($mkey) ?>" <?php if ($title == $item): ?>
					
						class="nav-link active"
					
					<?php else: ?>
						class="nav-link"
					
				<?php endif; ?>
					><?= ($item) ?> <?php if ($title == $item): ?><span class="sr-only">(current)</span><?php endif; ?></a>
					</li>
				<?php endforeach; ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Challenge Scoresheets</a>
					<div class="dropdown-menu">
						<?php foreach (($scoresheets?:[]) as $sckey=>$scitem): ?>
							<a class="dropdown-item" href="<?= ($BASE) ?><?= ($sckey) ?>"><?= ($scitem) ?></a>
						<?php endforeach; ?>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Generators</a>
					<div class="dropdown-menu">
						<?php foreach (($generators?:[]) as $genkey=>$genitem): ?>
							<a class="dropdown-item" href="<?= ($BASE) ?><?= ($genkey) ?>"><?= ($genitem) ?></a>
						<?php endforeach; ?>
					</div>
				</li>
			</ul>
			<ul class="navbar-nav navbar-light">
			<?php if ($SESSION['user']): ?>
				
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user">&nbsp;</i> My Account</a>
						<div class="dropdown-menu">
							<?php foreach (($account?:[]) as $acckey=>$accitem): ?>
								<a class="dropdown-item" href="<?= ($BASE) ?><?= ($acckey) ?>"><?= ($accitem) ?></a>
							<?php endforeach; ?>
							<?php if ($SESSION['user'][1] == 'Admin'): ?>
								<div class="dropdown-divider"></div>
								<?php foreach (($admin?:[]) as $adminkey=>$adminitem): ?>
									<a class="dropdown-item" href="<?= ($BASE) ?><?= ($adminkey) ?>"><?= ($adminitem) ?></a>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</li>
					<li class="nav-item"><a class="nav-link" href="<?= ($BASE) ?>/user/logout"><i class="fa fa-sign-out">&nbsp;</i> Logout</a></li>
				
				<?php else: ?>
					<li class="nav-item"><a class="nav-link" href="#login" data-toggle="modal"><i class="fa fa-sign-in" aria-hidden="true">&nbsp;</i> Login</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= ($BASE) ?>/user/register"><i class="fa fa-user-plus" aria-hidden="true">&nbsp;</i> Register</a></li>
				
			<?php endif; ?>
			</ul>
        </div>
		</div>
    </nav>
</header>

