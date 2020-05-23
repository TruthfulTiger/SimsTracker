<?php
class AuthenticateController  extends Controller {
	private $user;
	private $audit;

	public function __construct() {
		parent::__construct();
		$this->user = new User($this->db);
		$this->audit = \Audit::instance();
	}

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
			$login = date('Y-m-d H:i:s');

			$this->user->getByName($username);

			if($this->user->dry()) {
				$this->f3->set('SESSION.error', 'Login unsuccessful. Please ensure you have typed your email and password correctly.');
				$this->f3->reroute('/');
			}

			if(password_verify($password, $this->user->password)) {
				$this->user->lastLogin = $login;
				$this->user->save();
				$this->f3->set('SESSION.user', array($this->user->name, $this->user->role, $this->user->id, $this->user->email));
				$this->f3->reroute('/user/profile');
				if($_POST["remember"]==1 || $_POST["remember"]=='on' || isset($_POST["remember"]))
                    {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('username', $username, $hour);
                         setcookie('password', $password, $hour);
                    }
			} else {
				$this->f3->set('SESSION.error', 'Login unsuccessful. Please ensure you have typed your email and password correctly.');
				$this->f3->reroute('/');
			}
		}
	}

	public function register()
	{
		if (!empty($_POST['hptrap'])) {
			die('Nice try, Spam-A-Lot');
		} else {
			if ($this->audit->email($this->f3->get('POST.email'), FALSE)) {
				$username = $this->f3->get('POST.email');
				$password = password_hash($this->f3->get('POST.password'), PASSWORD_DEFAULT);
				$this->f3->set('POST.password', $password);

				$this->user->getByName($username);

				if($this->user->dry()) {
					$this->user->add();
					$this->f3->set('SESSION.success', 'Registration successful. You may now log in.');
				} else {
					$this->f3->set('SESSION.error', 'User already exists');
				}
			} else {
				$this->f3->set('SESSION.error', 'Email address is invalid.');
			}	
			$this->f3->reroute('/');
		}
	}

	public function logout () {
		$this->f3->clear('SESSION.user');
		$this->f3->set('SESSION.info', 'You have now logged out.');
		$this->f3->reroute('/');
	}

	public function forgot () {
	if (!empty($_POST['hptrap'])) {
		die('Nice try, Spam-A-Lot');
	} else {
		$username = $this->f3->get('POST.email');
		$this->user->getByName($username);

		if($this->user->dry()) {
			$this->f3->set('SESSION.error', 'Email address cannot be found.');
		} else {
			$this->mail->addAddress($username);     // Add a recipient
			$this->mail->addReplyTo('sammyphoenix79@gmail.com', 'Admin');
			// Content
			$this->mail->isHTML(true);                                 
			$this->mail->Subject = 'Sims Tracker: Reset password';
			$this->mail->Body = <<<EOT
										Greetings,

										You have received this message because someone with your email address has requested a password reset. If this was not you, we advise you to login and change your password immediately.

										If this was you, you can reset your password by clicking the below link:

										<a href="#">Reset my password</a>

										Many thanks,

										Sims Tracker Admin
EOT;

			$this->mail->AltBody = <<<EOT
										Greetings,

										You have received this message because someone with your email address has requested a password reset. If this was not you, we advise you to login and change your password immediately.abstract

										If this was you, you can reset your password by copying the below link and pasting it into your browser's address bar:

										[url]

										Many thanks,

										Sims Tracker Admin
EOT;

			$this->mail->send();
			$this->f3->set('SESSION.success', 'Thank you, you should receive an email from us soon.');
		}
		$this->f3->reroute('/');
		}
	}
}