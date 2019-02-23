<?php
class ChallengeController extends Controller {
	private $challenge;
	private $household;
	private $hood;
	private $legacy;

	public function __construct() {
		parent::__construct();
		$this->challenge = new Challenge($this->db);
		$this->household = new Household($this->db);
		$this->hood = new Hood($this->db);
		$this->legacy = new S2Legacy($this->db);
	}

	public function index()
	{
		$this->f3->clear('SESSION.challenge');
		$userID = $this->f3->get('SESSION.user[2]');
		$this->f3->set('households',$this->household->getByUser($userID));
		$this->f3->set('hoods',$this->hood->getByUser($userID));
		$this->f3->set('challenges',$this->challenge->getByUser($userID));
		$this->f3->set('title','Challenges');
		$this->f3->set('content','challenges/list.html');
	}

	public function create()
	{
		if($this->f3->exists('POST.create'))
		{
			if (!empty($_POST['hptrap'])) {
				die('Nice try, Spam-A-Lot');
			} else {
				$this->f3->scrub($_POST,'p; br;');
				$lastAdded = $this->challenge->get('_id');
				$this->challenge->add();
				$lastID = $this->challenge->get('_id');
				if ($lastID !== $lastAdded) {
					$this->f3->set('SESSION.success', 'Challenge has been created.');
				} else {
					$this->f3->set('SESSION.error', 'Couldn\'t create challenge.');
				}

				$this->f3->reroute('/challenges');
			}
		}
		else
		{
			$userID = $this->f3->get('SESSION.user[2]');
			$this->f3->set('userID', $this->f3->get('SESSION.user[2]'));
			$this->f3->set('hoods', $this->hood->getByUser($userID));
			$this->f3->set('households', $this->household->getByUser($userID));
			if (strpos($this->f3->get('PARAMS[0]'), '/create/hood/') !== false) {
				$this->f3->set('hhID', NULL);
				$this->f3->set('nhID', $this->f3->get('PARAMS.id'));
				$this->f3->set('title','Create Challenge');
				$this->f3->set('content','challenges/create.html');
			} else if (strpos($this->f3->get('PARAMS[0]'), '/create/household/') !== false) {
				$this->f3->set('hhID', $this->f3->get('PARAMS.id'));
				$hh = $this->household->getById($this->f3->get('PARAMS.id'));
				$this->f3->set('nhID', NULL);
				$this->f3->set('title','Create Challenge');
				$this->f3->set('content','challenges/create.html');
			} else {
				$this->f3->set('SESSION.error', 'You need to add a challenge to either a hood or household.');
				$this->f3->reroute('/households');
			}
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
				$this->challenge->edit($this->f3->get('POST.id'));
				$this->f3->set('SESSION.success', 'Challenge has been updated.');
				$this->f3->reroute('/challenges');
			}
		} else
		{
			$this->challenge->getById($this->f3->get('PARAMS.id'));
			$this->legacy->getByCID($this->f3->get('PARAMS.id'));
			if($this->f3->exists('PARAMS.id')) {
				$this->f3->set('challenge',$this->challenge);
				$this->f3->set('s2legacy', $this->legacy);
				$this->f3->set('title','Update Challenge');
				$this->f3->set('content','challenges/update.html');
			} else {
				$this->f3->set('SESSION.error', 'Challenge doesn\'t exist');
				$this->f3->reroute('/challenges');
			}
		}
	}


	public function delete()
	{
		if($this->f3->exists('PARAMS.id'))
		{
			$this->challenge->delete($this->f3->get('PARAMS.id'));
			$this->f3->set('SESSION.success', 'Challenge was deleted');
		} else {
			$this->f3->set('SESSION.error', 'Challenge doesn\'t exist');
		}

		$this->f3->reroute('/challenges');
	}
}