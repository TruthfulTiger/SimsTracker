<?php
require 'vendor/autoload.php';
date_default_timezone_set("Europe/London");
$f3=Base::instance();
$f3->set('copyyear',date("Y"));
$f3->config('config/globals.cfg');
$f3->config('config/games.cfg');
$f3->config('config/menus.cfg');
$f3->config('config/routes.cfg');

new Session();

$f3->set('ONERROR',
	function($f3) {
	$controller = new Controller();
	$errorcontroller = new ErrorController();
	$errorcontroller->beforeroute();
		$log=new Log('error.log');
		// recursively clear existing output buffers:
		while (ob_get_level())
			ob_end_clean();
		$msg=$f3->get('ERROR.status').' '.$f3->get('ERROR.text');
		$f3->set('title',$f3->get('ERROR.status'));
		$log->write($msg);
		$errorcontroller->afterroute();
	}
);

$f3->run();
