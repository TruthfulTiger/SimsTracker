<?php
class Controller {

	protected $f3;
	protected $db;

	function beforeroute() {
		if($this->f3->get('SESSION.user') === null ) {
			$this->f3->set('SESSION.error',
				'You need to be logged in to access that page.');
			$this->f3->reroute('/');
			exit;
		}
	}

	function afterroute() {
		echo Template::instance()->render('main.html');
		$this->f3->clear('SESSION.error');
		$this->f3->clear('SESSION.success');
		$this->f3->clear('SESSION.info');
		$this->f3->clear('SESSION.warning');
	}

	function __construct() {
		$f3 = Base::instance();
		\Assets::instance();
		$db=new DB\SQL(
			$f3->get('db_dns') . $f3->get('db_name'),
			$f3->get('db_user'),
			$f3->get('db_pass'), array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
		);

		$this->f3=$f3;
		$this->db=$db;
	}
}