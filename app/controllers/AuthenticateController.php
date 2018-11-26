<?php

class AuthenticateController  extends Controller {
	function beforeroute(){

	}

	public function signup() {
		if ($this->f3->exists('SESSION.user')) {
			$this->f3->set('SESSION.error', 'You are already logged in.');
			$this->f3->reroute('/');
		} else {
			$this->f3->set('title','Register');
			$this->f3->set('content','register.html');
		}
	}

	function authenticate() {
		if (!empty($_POST['hptrap'])) {
			die('Nice try, Spam-A-Lot');
		} else {
			$username = $this->f3->get('POST.email');
			$password = $this->f3->get('POST.password');

			$user = new User($this->db);
			$user->getByName($username);

			if($user->dry()) {
				$this->f3->set('SESSION.error', 'User doesn\'t exist');
				$this->f3->reroute('/');
			}

			if(password_verify($password, $user->password)) {
				$user->lastLogin = time();
				$this->f3->set('SESSION.user', array($user->name, $user->role, $user->id));
				$this->f3->reroute('/user/profile');
			} else {
				$this->f3->set('SESSION.error', 'Login unsuccessful');
				$this->f3->reroute('/');
			}
		}
	}

	public function register()
	{
		if (!empty($_POST['hptrap'])) {
			die('Nice try, Spam-A-Lot');
		} else {
			$username = $this->f3->get('POST.email');
			$password = password_hash($this->f3->get('POST.password'), PASSWORD_DEFAULT);
			$this->f3->set('POST.password', $password);

			$user = new User($this->db);
			$user->getByName($username);

			if($user->dry()) {
				$user->add();
				$this->f3->set('SESSION.success', 'Registration successful. You may now log in.');
			} else {
				$this->f3->set('SESSION.error', 'User already exists');
			}

			$this->f3->reroute('/');
		}
	}

	public function logout () {
		$this->f3->clear('SESSION.user');
		$this->f3->set('SESSION.info', 'You have now logged out.');
		$this->f3->reroute('/');
	}
}