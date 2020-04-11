<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Controller {

	protected $f3;
	protected $db;
	protected $page;
	protected $web;
	protected $mail;

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
		$web = \Web::instance();
		$page = \Template::instance()->extend('pagebrowser','\Pagination::renderTag');
		$db=new DB\SQL(
			$f3->get('db_dns') . $f3->get('db_name'),
			$f3->get('db_user'),
			$f3->get('db_pass'), array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
		);
		$mail = new PHPMailer(true);

		if (!function_exists('debug_to_console')) {
			function debug_to_console($data) {
				$output=$data;
				if (is_array($output))
					$output=implode(',',$output);

				echo "<script>console.log( 'Debug Objects: ".$output."' );</script>";
			}

					//Server settings
					$mail->isSMTP();                                            // Send using SMTP
					$mail->Host       = 'smtp-mail.outlook.com';                    // Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
					$mail->Username   = 'silverd@hotmail.co.uk';                     // SMTP username
					$mail->Password   = 'GingerB33r';                               // SMTP password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
					$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
					//Recipients
					$mail->setFrom('silverd@hotmail.co.uk', 'Sims Tracker');
		}


        /**
         * searches a simple as well as multi dimension array
         * @param type $needle
         * @param type $haystack
         * @return boolean
         */
		if (!function_exists('in_array_multi'))   {
        function in_array_multi($needle, $haystack){
            $needle = trim($needle);
            if(!is_array($haystack))
                return False;

            foreach($haystack as $key=>$value){
                if(is_array($value)){
                    if(in_array_multi($needle, $value))
                        return True;
                    else
                        in_array_multi($needle, $value);
                }
                else
                    if(trim($value) === trim($needle)){//visibility fix//
                        error_log("$value === $needle setting visibility to 1 hidden");
                        return True;
                    }
            }

            return False;
            }
        }

		$this->f3=$f3;
		$this->mail=$mail;
		$this->db=$db;
		$this->web=$web;
		$this->page=$page;
	}
}