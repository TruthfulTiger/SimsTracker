<?php
class SimController extends Controller {
	private $sim;
	private $household;
    private $hood;
    private $relationship;
    private $user;
	private $business;

	public function __construct() {
		parent::__construct();
		$this->sim = new Sim($this->db);
		$this->household = new Household($this->db);
        $this->hood = new Hood($this->db);
		$this->business = new Business($this->db);
        $this->user = new User($this->db);
        $this->relationship = new Relationships($this->db);
	}

	public function index()
	{
		$userID = $this->f3->get('SESSION.user[2]');
		$this->f3->clear('SESSION.url');
		if($this->f3->exists('PARAMS.id')){
			$hhID = $this->f3->get('PARAMS.id');
			$this->f3->set('households',$this->household->getById($hhID));
			if ($this->household->userID != $userID) {
				$this->f3->set('SESSION.error', 'No such household associated with this user.');
				$this->f3->reroute('/sims');
			} else {
				$this->f3->set('sims',$this->sim->getByhhID($hhID));
				$this->f3->set('title','Sims in '.$this->household->name.' Household');
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

				$this->index();
			}
		} else if ($this->f3->exists('POST.hh')) {
			$this->f3->scrub($_POST,'p; br;');
			$url = '/create/'.$this->f3->get('POST.hh');
			$this->f3->reroute($url);
		}
		else
		{
			$userID = $this->f3->get('SESSION.user[2]');
			$hood = $this->hood;
			if ($hood->gameVersion == 2)
				$this->f3->config('config/sims2.cfg');
			if ($hood->gameVersion == 3)
				$this->f3->config('config/sims3.cfg');
			if ($hood->gameVersion == 4)
				$this->f3->config('config/sims4.cfg');
			$this->f3->set('userID', $this->f3->get('SESSION.user[2]'));
			$this->f3->set('households', $this->household->getByUser($userID));
			$this->household->getById($this->f3->get('PARAMS.id'));
			$this->f3->set('hh', $this->household);
			$this->f3->set('title','Create Sim');
			$this->f3->set('content','sim/create.html');
		}
	}

	public function move() {
		if (!empty($_POST['hptrap'])) {
			die('Nice try, Spam-A-Lot');
		} else {
			$this->f3->scrub($_POST,'p; br;');
			$hhID = $_POST['hhID'];
				if ($this->f3->exists('POST.hhSims')) {
					$sims[] = $this->f3->get('POST.hhSims');
					foreach ($sims[0] as $sim){ 
						$this->db->exec('UPDATE sims SET hhID = ? WHERE id = ?', 
						array(
							$hhID,
							$sim
						));
					} 
					$this->f3->set('SESSION.success', 'Sim has been moved.'); 
				} else {
			$this->f3->set('SESSION.error', 'Please choose at least one sim.');
			} 
			$this->index();
		}
	}

	public function update()
	{
		if($this->f3->exists('POST.update'))
		{
			if (!empty($_POST['hptrap'])) {
				die('Nice try, Spam-A-Lot');
			} else {
				$this->save();
				$this->f3->scrub($_POST,'p; br;');
				$this->sim->edit($this->f3->get('POST.id'));
				$parent1 = $this->sim->parent1;
				$parent2 = $this->sim->parent2;

				// TODO: Get this working without creating relationships every time sim's updated
/* 				if ($parent1 > 0) { 
					$this->relationship->relCreate($this->sim->userID, $this->sim->nhID, $parent1, $this->sim->id);
				}
				if ($parent2 > 0 && $parent2 < 9998) {
					$this->relationship->relCreate($this->sim->userID, $this->sim->nhID, $parent2, $this->sim->id);
				} */
				$this->f3->set('SESSION.success', 'Sim has been updated.');
				$this->f3->reroute($this->f3->get('SESSION.url'));
			}
		} else
		{
			if(!$this->f3->exists('SESSION.url'))
				$this->f3->set('SESSION.url', $this->f3->get('PARAMS.0'));
            $this->sim->getById($this->f3->get('PARAMS.id'));
			$this->hood->getById($this->sim->nhID);
			$userID = $this->f3->get('SESSION.user[2]');
			$parents = $this->db->exec('SELECT * FROM sims WHERE nhID = ?', $this->sim->nhID);
			$hood = $this->hood;
			if ($hood->gameVersion == 2)
				$this->f3->config('config/sims2.cfg');
			if ($hood->gameVersion == 3)
				$this->f3->config('config/sims3.cfg');
			if ($hood->gameVersion == 4)
				$this->f3->config('config/sims4.cfg');
			if($this->f3->exists('PARAMS.id')) {
                $this->f3->set('sim', $this->sim);
				$this->f3->set('hood', $this->hood);
				$this->user->getById($this->f3->get('SESSION.user[2]'));
				$this->f3->set('households', $this->household->getByUser($userID));
				$this->household->getById($this->sim->hhID);
				$this->f3->set('hh', $this->household);
				$this->f3->set('user', $this->user);
				$this->f3->set('parents', $parents);
				$this->f3->set('title','Update Sim');
				$this->f3->set('content','sim/update.html');
            } else {
				$this->f3->set('SESSION.error', 'Sim doesn\'t exist');
				$this->index();
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

	public function view()
	{
		$this->sim->getById($this->f3->get('PARAMS.id'));
		$this->hood->getById($this->sim->nhID);
		$this->business->getByOwner($this->f3->get('PARAMS.id'));
		$name = $this->sim->firstName.' '.$this->sim->lastName;
		$hood = $this->hood;
			if ($hood->gameVersion == 2)
				$this->f3->config('config/sims2.cfg');
			if ($hood->gameVersion == 3)
				$this->f3->config('config/sims3.cfg');
			if ($hood->gameVersion == 4)
				$this->f3->config('config/sims4.cfg');
		if($this->f3->exists('PARAMS.id')) {
			$this->f3->set('sim',$this->sim);
			$this->f3->set('hood', $this->hood);
			$this->f3->set('business', $this->business);
			$this->f3->set('title',$name);
			$this->f3->set('content','sim/view.html');
		} else {
			$this->f3->set('SESSION.error', 'Sim doesn\'t exist');
			$this->index();
		}
	}

	function save() {
		if (isset($_POST['save'])) {
			$this->f3->set('POST.isAlien', isset($_POST["isAlien"])?1:0);
			$this->f3->set('POST.isZombie',isset($_POST["isZombie"])?1:0);
			$this->f3->set('POST.isVampire',isset($_POST["isVampire"])?1:0);
			$this->f3->set('POST.isServo',isset($_POST["isServo"])?1:0);
			$this->f3->set('POST.isWerewolf',isset($_POST["isWerewolf"])?1:0);
			$this->f3->set('POST.isPlantSim',isset($_POST["isPlantSim"])?1:0);
			$this->f3->set('POST.isWitch',isset($_POST["isWitch"])?1:0);
			$this->f3->set('POST.walking',isset($_POST["walking"])?1:0);
			$this->f3->set('POST.talking',isset($_POST["talking"])?1:0);
			$this->f3->set('POST.housebroken',isset($_POST["housebroken"])?1:0);
			$this->f3->set('POST.rhyme',isset($_POST["rhyme"])?1:0);
			$this->f3->set('POST.ltwDone',isset($_POST["ltwDone"])?1:0);

			$this->f3->set('POST.earnedAthletics', isset($_POST["earnedAthletics"])?1:0);
			$this->f3->set('POST.earnedCharisma',isset($_POST["earnedCharisma"])?1:0);
			$this->f3->set('POST.earnedHygienics',isset($_POST["earnedHygienics"])?1:0);
			$this->f3->set('POST.earnedCulinary',isset($_POST["earnedCulinary"])?1:0);
			$this->f3->set('POST.earnedGenius',isset($_POST["earnedGenius"])?1:0);
			$this->f3->set('POST.earnedEngineering',isset($_POST["earnedEngineering"])?1:0);
			$this->f3->set('POST.earnedArts',isset($_POST["earnedArts"])?1:0);
			$this->f3->set('POST.earnedYEA',isset($_POST["earnedYEA"])?1:0);
			$this->f3->set('POST.earnedScholar',isset($_POST["earnedScholar"])?1:0);
			$this->f3->set('POST.earnedBilliards',isset($_POST["earnedBilliards"])?1:0);
			$this->f3->set('POST.earnedFootwork',isset($_POST["earnedFootwork"])?1:0);
			$this->f3->set('POST.earnedUndead',isset($_POST["earnedUndead"])?1:0);
			$this->f3->set('POST.earnedOrphan',isset($_POST["earnedOrphan"])?1:0);
			$this->f3->set('POST.earnedET',isset($_POST["earnedET"])?1:0);

			$this->f3->set('POST.cash1', isset($_POST["cash1"])?1:0);
			$this->f3->set('POST.cash2',isset($_POST["cash2"])?1:0);
			$this->f3->set('POST.cash3',isset($_POST["cash3"])?1:0);
			$this->f3->set('POST.cash4',isset($_POST["cash4"])?1:0);
			$this->f3->set('POST.cash5',isset($_POST["cash5"])?1:0);
			$this->f3->set('POST.wholesale1',isset($_POST["wholesale1"])?1:0);
			$this->f3->set('POST.wholesale2',isset($_POST["wholesale2"])?1:0);
			$this->f3->set('POST.wholesale3',isset($_POST["wholesale3"])?1:0);
			$this->f3->set('POST.wholesale4',isset($_POST["wholesale4"])?1:0);
			$this->f3->set('POST.wholesale5',isset($_POST["wholesale5"])?1:0);
			$this->f3->set('POST.perception1',isset($_POST["perception1"])?1:0);
			$this->f3->set('POST.perception2',isset($_POST["perception2"])?1:0);
			$this->f3->set('POST.perception3',isset($_POST["perception3"])?1:0);
			$this->f3->set('POST.perception4',isset($_POST["perception4"])?1:0);
			$this->f3->set('POST.perception5',isset($_POST["perception5"])?1:0);
			$this->f3->set('POST.motivation1',isset($_POST["motivation1"])?1:0);
			$this->f3->set('POST.motivation2',isset($_POST["motivation2"])?1:0);
			$this->f3->set('POST.motivation3',isset($_POST["motivation3"])?1:0);
			$this->f3->set('POST.motivation4',isset($_POST["motivation4"])?1:0);
			$this->f3->set('POST.motivation5',isset($_POST["motivation5"])?1:0);
			$this->f3->set('POST.connections1',isset($_POST["connections1"])?1:0);
			$this->f3->set('POST.connections2',isset($_POST["connections2"])?1:0);
			$this->f3->set('POST.connections3',isset($_POST["connections3"])?1:0);
			$this->f3->set('POST.connections4',isset($_POST["connections4"])?1:0);
			$this->f3->set('POST.connections5',isset($_POST["connections5"])?1:0);

			$this->f3->set('POST.goodHols', isset($_POST["goodHols"])?1:0);
			$this->f3->set('POST.goodHols3',isset($_POST["goodHols3"])?1:0);
			$this->f3->set('POST.goodHols5',isset($_POST["goodHols5"])?1:0);
			$this->f3->set('POST.tour',isset($_POST["tour"])?1:0);
			$this->f3->set('POST.tours5',isset($_POST["tours5"])?1:0);
			$this->f3->set('POST.allTours',isset($_POST["allTours"])?1:0);
			$this->f3->set('POST.allGestures',isset($_POST["allGestures"])?1:0);
			$this->f3->set('POST.roomService',isset($_POST["roomService"])?1:0);
			$this->f3->set('POST.photoAlbum',isset($_POST["photoAlbum"])?1:0);
			$this->f3->set('POST.secretMap',isset($_POST["secretMap"])?1:0);
			$this->f3->set('POST.secretLot',isset($_POST["secretLot"])?1:0);
			$this->f3->set('POST.secretLotAll',isset($_POST["secretLotAll"])?1:0);
			$this->f3->set('POST.mountainHols',isset($_POST["mountainHols"])?1:0);
			$this->f3->set('POST.flapjacks',isset($_POST["flapjacks"])?1:0);
			$this->f3->set('POST.chestPound',isset($_POST["chestPound"])?1:0);
			$this->f3->set('POST.slapDance',isset($_POST["slapDance"])?1:0);
			$this->f3->set('POST.dtMassage',isset($_POST["dtMassage"])?1:0);
			$this->f3->set('POST.tent',isset($_POST["tent"])?1:0);
			$this->f3->set('POST.logRoll',isset($_POST["logRoll"])?1:0);
			$this->f3->set('POST.axes',isset($_POST["axes"])?1:0);
			$this->f3->set('POST.treeRing',isset($_POST["treeRing"])?1:0);
			$this->f3->set('POST.bigfoot',isset($_POST["bigfoot"])?1:0);
			$this->f3->set('POST.islandHols',isset($_POST["islandHols"])?1:0);
			$this->f3->set('POST.pineapple',isset($_POST["pineapple"])?1:0);
			$this->f3->set('POST.hangLoose',isset($_POST["hangLoose"])?1:0);
			$this->f3->set('POST.hulaDance',isset($_POST["hulaDance"])?1:0);
			$this->f3->set('POST.fireDance',isset($_POST["fireDance"])?1:0);
			$this->f3->set('POST.hsMassage',isset($_POST["hsMassage"])?1:0);
			$this->f3->set('POST.monkeyOffering',isset($_POST["monkeyOffering"])?1:0);
			$this->f3->set('POST.playPirate',isset($_POST["playPirate"])?1:0);
			$this->f3->set('POST.seaChantey',isset($_POST["seaChantey"])?1:0);
			$this->f3->set('POST.beachTreasure',isset($_POST["beachTreasure"])?1:0);
			$this->f3->set('POST.treasureChest',isset($_POST["treasureChest"])?1:0);
			$this->f3->set('POST.mrMickles',isset($_POST["mrMickles"])?1:0);
			$this->f3->set('POST.easternHols',isset($_POST["easternHols"])?1:0);
			$this->f3->set('POST.chirashi',isset($_POST["chirashi"])?1:0);
			$this->f3->set('POST.bow',isset($_POST["bow"])?1:0);
			$this->f3->set('POST.taiChi',isset($_POST["taiChi"])?1:0);
			$this->f3->set('POST.apMassage',isset($_POST["apMassage"])?1:0);
			$this->f3->set('POST.drankTea',isset($_POST["drankTea"])?1:0);
			$this->f3->set('POST.zen',isset($_POST["zen"])?1:0);
			$this->f3->set('POST.mahjong',isset($_POST["mahjong"])?1:0);
			$this->f3->set('POST.shrine',isset($_POST["shrine"])?1:0);
			$this->f3->set('POST.teleport',isset($_POST["teleport"])?1:0);
			$this->f3->set('POST.dragon',isset($_POST["dragon"])?1:0);

			$this->f3->set('POST.dpBeetle',isset($_POST["dpBeetle"])?1:0);
			$this->f3->set('POST.pBeetle',isset($_POST["pBeetle"])?1:0);
			$this->f3->set('POST.cpBeetle',isset($_POST["cpBeetle"])?1:0);
			$this->f3->set('POST.gmBeetle',isset($_POST["gmBeetle"])?1:0);
			$this->f3->set('POST.jBeetle',isset($_POST["jBeetle"])?1:0);
			$this->f3->set('POST.prBeetle',isset($_POST["prBeetle"])?1:0);
			$this->f3->set('POST.thgBeetle',isset($_POST["thgBeetle"])?1:0);
			$this->f3->set('POST.rBeetle',isset($_POST["rBeetle"])?1:0);
			$this->f3->set('POST.mlBeetle',isset($_POST["mlBeetle"])?1:0);
			$this->f3->set('POST.gbBeetle',isset($_POST["gbBeetle"])?1:0);
			$this->f3->set('POST.jButterfly',isset($_POST["jButterfly"])?1:0);
			$this->f3->set('POST.pbButterfly',isset($_POST["pbButterfly"])?1:0);
			$this->f3->set('POST.eButterfly',isset($_POST["eButterfly"])?1:0);
			$this->f3->set('POST.bfwButterfly',isset($_POST["bfwButterfly"])?1:0);
			$this->f3->set('POST.mgButterfly',isset($_POST["mgButterfly"])?1:0);
			$this->f3->set('POST.mButterfly',isset($_POST["mButterfly"])?1:0);
			$this->f3->set('POST.vButterfly',isset($_POST["vButterfly"])?1:0);
			$this->f3->set('POST.pButterfly',isset($_POST["pButterfly"])?1:0);
			$this->f3->set('POST.cpButterfly',isset($_POST["cpButterfly"])?1:0);
			$this->f3->set('POST.sButterfly',isset($_POST["sButterfly"])?1:0);
			$this->f3->set('POST.ssSpider',isset($_POST["ssSpider"])?1:0);
			$this->f3->set('POST.gwSpider',isset($_POST["gwSpider"])?1:0);
			$this->f3->set('POST.pSpider',isset($_POST["pSpider"])?1:0);
			$this->f3->set('POST.mSpider',isset($_POST["mSpider"])?1:0);
			$this->f3->set('POST.ibSpider',isset($_POST["ibSpider"])?1:0);
			$this->f3->set('POST.hdSpider',isset($_POST["hdSpider"])?1:0);
			$this->f3->set('POST.qcSpider',isset($_POST["qcSpider"])?1:0);
			$this->f3->set('POST.hpSpider',isset($_POST["hpSpider"])?1:0);
			$this->f3->set('POST.sfbSpider',isset($_POST["sfbSpider"])?1:0);
			$this->f3->set('POST.tbSpider',isset($_POST["tbSpider"])?1:0);

			$this->f3->set('POST.artsplq', isset($_POST["artsplq"])?1:0);
			$this->f3->set('POST.filmplq',isset($_POST["filmplq"])?1:0);
			$this->f3->set('POST.fitplq',isset($_POST["fitplq"])?1:0);
			$this->f3->set('POST.cusplaq',isset($_POST["cusplaq"])?1:0);
			$this->f3->set('POST.gamesplq',isset($_POST["gamesplq"])?1:0);
			$this->f3->set('POST.musicplq',isset($_POST["musicplq"])?1:0);
			$this->f3->set('POST.natplq',isset($_POST["natplq"])?1:0);
			$this->f3->set('POST.sciplq',isset($_POST["sciplq"])?1:0);
			$this->f3->set('POST.sportplq',isset($_POST["sportplq"])?1:0);
			$this->f3->set('POST.tinkplq',isset($_POST["tinkplq"])?1:0);

			$this->f3->set('POST.learnedFire', isset($_POST["learnedFire"])?1:0);
			$this->f3->set('POST.learnedAnger',isset($_POST["learnedAnger"])?1:0);
			$this->f3->set('POST.learnedHappiness',isset($_POST["learnedHappiness"])?1:0);
			$this->f3->set('POST.learnedPhysio',isset($_POST["learnedPhysio"])?1:0);
			$this->f3->set('POST.learnedCounseling',isset($_POST["learnedCounseling"])?1:0);
			$this->f3->set('POST.learnedParenting',isset($_POST["learnedParenting"])?1:0);
		}
	}
}