<?php
class UserController extends Controller {
	private $user;

	public function __construct() {
		parent::__construct();
		$this->user = new User($this->db);
	}

	public function index()
	{
		$this->f3->set('users',$this->user->all());
		$this->f3->set('title','User List');
		$this->f3->set('content','user/list.html');
	}

	public function create()
	{
		if($this->f3->exists('POST.create'))
		{
			if (!empty($_POST['hptrap'])) {
				die('Nice try, Spam-A-Lot');
			} else {
				$this->f3->scrub($_POST,'p; br;');
				$lastAdded = $this->user->get('_id');
				$this->user->add();
				$lastID = $this->user->get('_id');
				if ($lastID !== $lastAdded) {
					$this->f3->set('SESSION.success', 'User has been added.');
				} else {
					$this->f3->set('SESSION.error', 'Couldn\'t create user.');
				}
				$this->f3->reroute('/users');
			}
		} else
		{
			$this->f3->set('title','Create User');
			$this->f3->set('content','user/create.html');
		}
	}

	public function update()
	{
		if($this->f3->exists('POST.update'))
		{
			if (!empty($_POST['hptrap'])) {
				die('Nice try, Spam-A-Lot');
			} else {
				$this->f3->scrub($_POST,'p; br;');
				$this->user->edit($this->f3->get('POST.id'));
				$this->f3->set('SESSION.success', 'User has been updated.');
				$this->f3->reroute('/users');
			}
		} else
		{
			$this->user->getById($this->f3->get('PARAMS.id'));
			if($this->f3->exists('PARAMS.id')) {
				$this->f3->set('user',$this->user);
				$this->f3->set('title','Update User');
				$this->f3->set('content','user/update.html');
			} else {
				$this->f3->set('SESSION.error', 'User doesn\'t exist');
				$this->f3->reroute('/users');
			}
		}
	}


	public function delete()
	{
		if($this->f3->exists('PARAMS.id'))
		{
			$this->user->delete($this->f3->get('PARAMS.id'));
			$this->f3->set('SESSION.success', 'User was deleted');
		} else {
			$this->f3->set('SESSION.error', 'User doesn\'t exist');
		}

		$this->f3->reroute('/users');
	}

	public function profile()
	{
		$this->user->getById($this->f3->get('SESSION.user[2]'));
		if($this->f3->exists('SESSION.user[2]')) {
			$this->f3->set('user',$this->user);
			$this->f3->set('title','Profile');
			$this->f3->set('content','user/profile.html');
		} else {
			$this->f3->set('SESSION.error', 'User doesn\'t exist');
			$this->f3->reroute('/users');
		}
	}
}