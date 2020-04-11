<?php
class ContactController extends Controller {
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
        $this->f3->set('content','contact.html');
        $this->f3->set('title', 'Contact me');
		
		if (isset($_POST['send'])) {
			if (!empty($_POST['hptrap'])) {
				die('Nice try, Spam-A-Lot');
			} else {
				try {
					$this->f3->scrub($_POST,'p; br;');
					$this->mail->addAddress('sammyphoenix79@gmail.com', 'Admin');     // Add a recipient
					$this->mail->addReplyTo($this->f3->get('POST.email'), $this->f3->get('POST.name'));

					// Content
					$this->mail->isHTML(true); 
					$this->mail->Subject = 'Contact form: '.$this->f3->get('POST.subject');
					$this->mail->Body = 
					<<<EOT
						<p><b>Email:</b> {$this->f3->get('POST.email')}</p>
						<p><b>Name:</b> {$this->f3->get('POST.name')}</p>
						<p>{$this->f3->get('POST.message')}</p>
EOT;
					$this->mail->AltBody = 
					<<<EOT
						Email: {$this->f3->get('POST.email')}
						Name: {$this->f3->get('POST.name')}
						Message: {$this->f3->get('POST.message')}
EOT;

					$this->mail->send();
					$this->f3->set('SESSION.success', 'Thank you, your message has been sent.');
				} catch (Exception $e) {
					$this->f3->set('SESSION.error', 'Your message could not be sent at this time.'); 
				}
			}	
		}
    }
}
