<?php
date_default_timezone_set( "Europe/London" );
require 'vendor/autoload.php';
$f3 = Base::instance();
Assets::instance();
$f3->set('copyyear', date("Y"));
$f3->config('config/globals.cfg');
$f3->config('config/games.cfg');
$f3->config('config/menus.cfg');
$f3->config('config/routes.cfg');

new Session();

$f3->set('ONERROR',
	function($f3) {
		// recursively clear existing output buffers:
		while (ob_get_level())
			ob_end_clean();
		$f3->set('title', $f3->get('ERROR.status'));
		echo Template::instance()->render('error.html');
	}
);

$f3->run();
