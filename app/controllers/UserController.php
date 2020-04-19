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
				$this->index();
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
				$this->index();
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
				$this->index();
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
        if(isset($_POST['update']))
        {
            if (!empty($_POST['hptrap'])) {
                die('Nice try, Spam-A-Lot');
            } else {
            	if (!empty($_POST['password'])) {
					$password = password_hash($this->f3->get('POST.password'), PASSWORD_DEFAULT);
					$this->f3->set('POST.password', $password);
				} else {
            		unset($_POST['password']);
				}
                $this->f3->set('POST.sims2', isset($_POST["sims2"])?1:0);
                $this->f3->set('POST.sims3', isset($_POST["sims3"])?1:0);
                $this->f3->set('POST.sims4', isset($_POST["sims4"])?1:0);
                $this->f3->set('POST.uni', isset($_POST["uni"])?1:0);
                $this->f3->set('POST.nl', isset($_POST["nl"])?1:0);
                $this->f3->set('POST.ofb', isset($_POST["ofb"])?1:0);
                $this->f3->set('POST.pets', isset($_POST["pets"])?1:0);
                $this->f3->set('POST.sns', isset($_POST["sns"])?1:0);
                $this->f3->set('POST.ft', isset($_POST["ft"])?1:0);
                $this->f3->set('POST.bv', isset($_POST["bv"])?1:0);
                $this->f3->set('POST.al', isset($_POST["al"])?1:0);
                $this->f3->scrub($_POST,'p; br;');
                $this->user->edit($this->f3->get('SESSION.user[2]'));
                $this->f3->set('SESSION.success', 'Profile has been updated.');
                $this->f3->reroute('/user/profile');
            }
        } else
        {
            $this->user->getById($this->f3->get('SESSION.user[2]'));
            $this->f3->set('user',$this->user);
            $this->f3->set('title','Profile');
            $this->f3->set('content','user/profile.html');
        }
	}

		public function careers()
	{
        if(isset($_POST['update']))
        {
            if (!empty($_POST['hptrap'])) {
                die('Nice try, Spam-A-Lot');
            } else {
                $this->f3->set('POST.sims2', isset($_POST["sims2"])?1:0);
                $this->f3->set('POST.sims3', isset($_POST["sims3"])?1:0);
                $this->f3->set('POST.sims4', isset($_POST["sims4"])?1:0);
                $this->f3->set('POST.uni', isset($_POST["uni"])?1:0);
                $this->f3->set('POST.nl', isset($_POST["nl"])?1:0);
                $this->f3->set('POST.ofb', isset($_POST["ofb"])?1:0);
                $this->f3->set('POST.pets', isset($_POST["pets"])?1:0);
                $this->f3->set('POST.sns', isset($_POST["sns"])?1:0);
                $this->f3->set('POST.ft', isset($_POST["ft"])?1:0);
                $this->f3->set('POST.bv', isset($_POST["bv"])?1:0);
                $this->f3->set('POST.al', isset($_POST["al"])?1:0);
                $this->f3->scrub($_POST,'p; br;');
                $this->user->edit($this->f3->get('SESSION.user[2]'));
                $this->f3->set('SESSION.success', 'Career has been updated.');
                $this->f3->reroute('/user/careers');
            }
        } else
        {
            $this->user->getById($this->f3->get('SESSION.user[2]'));
            $this->f3->set('user',$this->user);
            $this->f3->set('title','Careers Editor');
            $this->f3->set('content','user/careers.html');
        }
	}
}