<?php
class SimController extends Controller {
	private $sim;
	private $household;

	public function __construct() {
		parent::__construct();
		$this->sim = new Sim($this->db);
		$this->household = new Household($this->db);
	}


	public function index()
	{
		$userID = $this->f3->get('SESSION.user[2]');
		if($this->f3->exists('PARAMS.id')){
			$hhID = $this->f3->get('PARAMS.id');
			$this->f3->set('households',$this->household->getById($hhID));
			if ($this->household->userID != $userID) {
				$this->f3->set('SESSION.error', 'No such household associated with this user.');
				$this->f3->reroute('/households');
			} else {
				$this->f3->set('sims',$this->sim->getByhhID($hhID));
				$this->f3->set('title','Sims in '.$this->household->name);
				$this->f3->set('content','sim/list.html');
			}
		} else {
			$this->f3->set('households',$this->household->getByUser($userID));
			$this->f3->set('sims',$this->sim->getByUser($userID));
			$this->f3->set('title','Sims');
			$this->f3->set('content','sim/list.html');
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
				$lastAdded = $this->sim->get('_id');
				$this->sim->add();
				$lastID = $this->sim->get('_id');
				if ($lastID !== $lastAdded) {
					$this->f3->set('SESSION.success', 'Sim has been added.');
				} else {
					$this->f3->set('SESSION.error', 'Couldn\'t create Sim.');
				}

				$this->f3->reroute('/sims');
			}
		} else if ($this->f3->exists('POST.hh')) {
			$this->f3->scrub($_POST,'p; br;');
			$url = '/create/'.$this->f3->get('POST.hh');
			$this->f3->reroute($url);
		}
		else
		{
			$userID = $this->f3->get('SESSION.user[2]');
			$this->f3->config('config/sims2.cfg');
			$this->f3->set('userID', $this->f3->get('SESSION.user[2]'));
			$this->f3->set('households', $this->household->getByUser($userID));
			$this->f3->set('hhID', $this->f3->get('PARAMS.id'));
			$this->f3->set('title','Create Sim');
			$this->f3->set('content','sim/create.html');
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
				$this->sim->edit($this->f3->get('POST.id'));
				$this->f3->set('SESSION.success', 'Sim has been updated.');
				$this->f3->reroute('/sims');
			}
		} else
		{
			$this->sim->getById($this->f3->get('PARAMS.id'));
			$this->f3->config('config/sims2.cfg');
			if($this->f3->exists('PARAMS.id')) {
				$this->f3->set('sim',$this->sim);
				$this->f3->set('title','Update Sim');
				$this->f3->set('content','sim/update.html');
			} else {
				$this->f3->set('SESSION.error', 'Sim doesn\'t exist');
				$this->f3->reroute('/sims');
			}
		}
	}


	public function delete()
	{
		if($this->f3->exists('PARAMS.id'))
		{
			$this->sim->delete($this->f3->get('PARAMS.id'));
			$this->f3->set('SESSION.success', 'Sim was deleted');
		} else {
			$this->f3->set('SESSION.error', 'Sim doesn\'t exist');
		}

		$this->f3->reroute('/sims');
	}
}