<?php
class HoodController extends Controller {
	private $hood;

	public function __construct() {
		parent::__construct();
		$this->hood = new Hood($this->db);
	}


	public function index()
	{
		$userID = $this->f3->get('SESSION.user[2]');
		$this->hood->households='SELECT COUNT(*) as hhcount FROM household where id = nhID GROUP BY id ';
		if($this->f3->exists('PARAMS.id')){
			$game= $this->f3->get('PARAMS.id');
			$this->f3->set('hoods',$this->hood->getByGame($game));
			if ($this->hood->userID != $userID) {
				$this->f3->set('SESSION.error', 'No such hood associated with this user.');
				$this->f3->reroute('/hoods');
			} else {
				$this->f3->set('title','Hoods in Sims '.$this->hood->gameVersion);
				$this->f3->set('content','hood/list.html');
			}
		} else {
			$this->f3->set('versions',$this->hood->getByGame($this->hood->gameVersion));
			$this->f3->set('hoods',$this->hood->getByUser($userID));
			$this->f3->set('title','Neighbourhoods');
			$this->f3->set('content','hood/list.html');
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
				$lastAdded = $this->hood->get('_id'); // Store last ID before adding hood
				$this->hood->add();
				$lastID = $this->hood->get('_id'); // Store last ID after adding hood
				if ($lastID !== $lastAdded) { // If the two are different, that means a hood has been added
					$this->f3->set('SESSION.success', 'Neighbourhood has been added.');
				} else {
					$this->f3->set('SESSION.error', 'Couldn\'t create neighbourhood.');
				}

				$this->index();
			}
		} else
		{
			$this->f3->set('title','Create Neighbourhood');
			$this->f3->set('hoods',$this->hood->getByUser($this->f3->get('SESSION.user[2]')));
			$this->f3->set('game','');
			$this->f3->set('content','hood/create.html');
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
				$this->hood->edit($this->f3->get('POST.id'));
				$this->f3->set('SESSION.success', 'Neighbourhood has been updated.');
				$this->index();
			}
		} else
		{
			$parent = $this->hood->getByUser($this->f3->get('SESSION.user[2]'));
			if($this->f3->exists('PARAMS.id')) {
				$this->hood->getById($this->f3->get('PARAMS.id'));
				$this->f3->set('hood',$this->hood);
				$this->f3->set('parents', $parent);
				$this->f3->set('title','Update Neighbourhood');
				$this->f3->set('content','hood/update.html');
			} else {
				$this->f3->set('SESSION.error', 'Neighbourhood doesn\'t exist');
				$this->index();
			}
		}
	}


	public function delete()
	{
		if($this->f3->exists('PARAMS.id'))
		{
			$this->hood->delete($this->f3->get('PARAMS.id'));
			$this->f3->set('SESSION.success', 'Neighbourhood was deleted');
		} else {
			$this->f3->set('SESSION.error', 'Neighbourhood doesn\'t exist');
		}

		$this->f3->reroute('/hoods');
	}
}