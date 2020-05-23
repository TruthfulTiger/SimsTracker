<?php

class Relationships extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
		parent::__construct($db,'relationships');
	}

	public function all() {
		$this->load();
		return $this->query;
	}

	public function getById($id) {
		$this->load(array('id=?',$id));
		return $this->query;
	}

	public function getByUser($id) {
		$this->load(array('userID=?',$id));
		return $this->query;
	}

	public function getBynhID($id) {
		$this->load(array('nhID=?',$id));
		return $this->query;
	}

	public function getByName($id) {
		$this->load(array('relName=?',$id));
		return $this->query;
	}

	public function getBySim1($id) {
		$this->load(array('sim1=?',$id));
		return $this->query;
	}

	public function getBySim2($id) {
		$this->load(array('sim1=2',$id));
		return $this->query;
	}

	public function add() {
		$this->reset();
		$this->copyFrom('POST');
		$this->save();
	}

// TODO: Get this working without creating relationships every time sim's updated
	public function relCreate($userID, $hood, $parent, $sim){
		if ($this->getBySim1($sim)) {
			$sim1 = $this->getBySim1($sim);
		} else if ($this->getBySim1($parent)){
			$sim1 = $this->getBySim1($parent);
		} else {
			$sim1 = 0;
		}

		if ($this->getBySim2($sim)) {
			$sim2 = $this->getBySim2($sim);
		} else if ($this->getBySim2($parent)){
			$sim2 = $this->getBySim2($parent);
		} else {
			$sim2 = 0;
		}
		
		if ($sim1 > 0) {
			$this->reset();
			$this->userID = $userID;
			$this->nhID = $hood;
			$this->sim1 = $sim;
			$this->sim2 = $parent;
			$this->isFamily = 1;
			$this->relName = 'Child';
			$this->save();
		}
		if ($sim2 > 0) {
			$this->reset();
			$this->userID = $userID;
			$this->nhID = $hood;
			$this->sim1 = $parent;
			$this->sim2 = $sim;
			$this->isFamily = 1;
			$this->relName = 'Parent';
			$this->save();
		}
	}

	public function edit($id) {
		$this->load(array('id=?',$id));
		$this->copyFrom('POST');
		$this->update();
	}

	public function delete($id) {
		$lastInsertID = $this->get('_id');
		$this->load(array('id=?',$id));
		$this->erase();
		$this->db->exec(
			'ALTER TABLE relationships AUTO_INCREMENT = '.intval($lastInsertID)
		);
	}
}