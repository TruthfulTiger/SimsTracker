<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= ($title) ?> | <?= ($site) ?></title>
	<script src="<?= ($BASE) ?>/ui/js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="<?= ($BASE) ?>/ui/css/bootstrap.min.css"/>
    <link href="<?= ($BASE) ?>/ui/css/sticky-footer-navbar.css" rel="stylesheet"/>
	


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<!-- assets-head -->
</head>
<body>

<?php echo $this->render('header.html',NULL,get_defined_vars(),0); ?>

<main role="main" class="container">
    <h1 class="mt-5"><?= ($title) ?></h1>
	
<?php if ($SESSION['success']): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="fa fa-check">&nbsp;&nbsp;&nbsp;</i> <?= ($SESSION['success'])."
" ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>

	
<?php if ($SESSION['error']): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<i class="fa fa-times">&nbsp;&nbsp;&nbsp;</i> <?= ($SESSION['error'])."
" ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>

	
<?php if ($SESSION['warning']): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<i class="fa fa-warning">&nbsp;&nbsp;&nbsp;</i> <?= ($SESSION['warning'])."
" ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>

	
<?php if ($SESSION['info']): ?>
		<div class="alert alert-info alert-dismissible fade show" role="alert">
			<i class="fa fa-info">&nbsp;&nbsp;&nbsp;</i> <?= ($SESSION['info'])."
" ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>

    
<?php echo $this->render($content,NULL,get_defined_vars(),0); ?>

</main>

<?php echo $this->render('footer.html',NULL,get_defined_vars(),0); ?>



<script src="<?= ($BASE) ?>/ui/js/bootstrap.bundle.js"></script>

<!-- assets-footer -->
</body>
</html>