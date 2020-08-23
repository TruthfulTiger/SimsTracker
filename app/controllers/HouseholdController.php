<?php
class HouseholdController extends Controller {
	private $household;
	private $hood;
	private $sim;

	public function __construct() {
		parent::__construct();
		$this->household = new Household($this->db);
		$this->hood = new Hood($this->db);
		$this->sim = new Sim($this->db);
	}


	public function index()
	{
		$userID = $this->f3->get('SESSION.user[2]');
		$this->household->sims='SELECT COUNT(*) as simscount FROM sims where sims.hhID = household.hhID GROUP BY hhID ';
		$this->household->pets='SELECT COUNT(*) as petscount FROM pets where pets.hhID = household.hhID GROUP BY hhID ';
		$this->household->businesses='SELECT COUNT(*) as bizcount FROM businesses where businesses.hhID = household.hhID GROUP BY hhID ';

		if($this->f3->exists('PARAMS.id')){
			$nhID = $this->f3->get('PARAMS.id');
			$this->f3->set('hoods',$this->hood->getById($nhID));
			if ($this->hood->userID != $userID) {
				$this->f3->set('SESSION.error', 'No such neighbourhood associated with this user.');
				$this->f3->reroute('/hoods');
			} else {
				$this->f3->set('households',$this->household->getBynhID($nhID));
				$this->f3->set('title','Households in '.$this->hood->name);
				$this->f3->set('content','household/list.html');
			}
		} else {
			$this->f3->set('hoods',$this->hood->getByUser($userID));
			$this->f3->set('households',$this->household->getByUser($userID));
			$this->f3->set('title','Households');
			$this->f3->set('content','household/list.html');
		}
	}

	public function create()
	{
		if($this->f3->exists('POST.create'))
		{
			if (!empty($_POST['hptrap'])) {
				die('Nice try, Spam-A-Lot');
			} else {
				$this->f3->scrub($_POST,'p; br;');
				$lastAdded = $this->household->get('_id');
				$this->household->add();
				$lastID = $this->household->get('_id');
				if ($lastID !== $lastAdded) {
					if ($this->f3->exists('POST.hhSims')) {
						$sims[] = $this->f3->get('POST.hhSims');
						foreach ($sims[0] as $sim){ 
							$this->db->exec('UPDATE sims SET hhID = ? WHERE id = ?', 
							array(
								$lastID,
								$sim
							));
						} 
					}
					$this->f3->set('SESSION.success', 'Household has been added.');
				} else {
					$this->f3->set('SESSION.error', 'Couldn\'t create household.');
				}
				$this->index();
			}
		} else if ($this->f3->exists('POST.nh')) {
			$this->f3->scrub($_POST,'p; br;');
			$url = '/create/'.$this->f3->get('POST.nh');
			$this->f3->reroute($url);
		}
		else
		{
			$userID = $this->f3->get('SESSION.user[2]');
			$nhID = $this->f3->get('PARAMS.id');
			$hood = $this->hood;
			if ($hood->gameVersion == 2)
				$this->f3->config('config/sims2.cfg');
			if ($hood->gameVersion == 3)
				$this->f3->config('config/sims3.cfg');
			if ($hood->gameVersion == 4)
				$this->f3->config('config/sims4.cfg');
			$this->f3->set('userID', $this->f3->get('SESSION.user[2]'));
			$this->f3->set('hoods', $this->hood->getByUser($userID));
			$this->hood->getById($nhID);
			$this->f3->set('hood', $this->hood);
			$this->f3->set('sims',$this->sim->getBynhID($nhID));
			$this->f3->set('title','Create Household');
			$this->f3->set('content','household/create.html');
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
				$this->household->edit($this->f3->get('POST.id'));
				$this->f3->set('SESSION.success', 'Household has been updated.');
				$this->index();
			}
		} else
		{
			$this->household->getById($this->f3->get('PARAMS.id'));
			if($this->f3->exists('PARAMS.id')) {
				$this->f3->set('household',$this->household);
				$userID = $this->f3->get('SESSION.user[2]');
				$nhID = $this->household->nhID;
				$hood = $this->hood;
				if ($hood->gameVersion == 2)
					$this->f3->config('config/sims2.cfg');
				if ($hood->gameVersion == 3)
					$this->f3->config('config/sims3.cfg');
				if ($hood->gameVersion == 4)
					$this->f3->config('config/sims4.cfg');
				$this->f3->set('userID', $this->f3->get('SESSION.user[2]'));
				$this->f3->set('hoods', $this->hood->getByUser($userID));
				$this->hood->getById($nhID);
				$this->f3->set('hood', $this->hood);
				$this->f3->set('sims',$this->sim->getBynhID($nhID));
				$this->f3->set('title','Update Household');
				$this->f3->set('content','household/update.html');
			} else {
				$this->f3->set('SESSION.error', 'Household doesn\'t exist');
				$this->index();
			}
		}
	}


	public function delete()
	{
		if($this->f3->exists('PARAMS.id'))
		{
			$this->household->delete($this->f3->get('PARAMS.id'));
			$this->f3->set('SESSION.success', 'Household was deleted');
		} else {
			$this->f3->set('SESSION.error', 'Household doesn\'t exist');
		}
		$this->f3->reroute('/households');
	}
}