<?php
class Aspgen extends Controller {
	private $user;

	public function __construct() {
		parent::__construct();
		$this->user = new User($this->db);
	}

	function beforeroute(){

	}

    function index() {
		$this->user->getById($this->f3->get('SESSION.user[2]'));
		$this->f3->set('user', $this->user);
        $this->f3->set('content','aspgen.html');
        $this->f3->set('title', 'Aspiration Randomiser');
    }
}
