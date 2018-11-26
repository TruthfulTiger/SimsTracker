<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <a class="navbar-brand title" href="<?= ($BASE) ?>">Sims Tracker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li <?php if ($page == 'Home'): ?>class="nav-item active"<?php else: ?>class="nav-item"<?php endif; ?>>
                <a class="nav-link" href="<?= ($BASE) ?>">Home <?php if ($page == 'Home'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                </li>
                <li <?php if ($page == 'About'): ?>class='nav-item active'<?php else: ?>class='nav-item'<?php endif; ?>>
                    <a class="nav-link" href="<?= ($BASE) ?>/<?= ('about') ?>">About <?php if ($page == 'About'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                </li>
                <li <?php if ($page == 'Legacy'): ?>class="nav-item active"<?php else: ?>class="nav-item"<?php endif; ?>>
                    <a class="nav-link" href="<?= ($BASE) ?>/<?= ('legacy') ?>">Legacy scorecard <?php if ($page == 'Legacy'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>