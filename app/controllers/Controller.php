<?php
class Controller {

	protected $f3;
	protected $db;
	protected $web;

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
		$db=new DB\SQL(
			$f3->get('db_dns') . $f3->get('db_name'),
			$f3->get('db_user'),
			$f3->get('db_pass'), array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
		);

		if (!function_exists('debug_to_console')) {
			function debug_to_console($data) {
				$output=$data;
				if (is_array($output))
					$output=implode(',',$output);

				echo "<script>console.log( 'Debug Objects: ".$output."' );</script>";
			}
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
		$this->db=$db;
		$this->web=$web;
	}
}