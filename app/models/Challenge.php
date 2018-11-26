<?php

class Challenge extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
		parent::__construct($db,'challenge');
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

	public function getByhhID($id) {
		$this->load(array('hhID=?',$id));
		return $this->query;
	}

	public function getBynhID($id) {
		$this->load(array('nhID=?',$id));
		return $this->query;
	}

	public function getByName($id) {
		$this->load(array('name=?',$id));
		return $this->query;
	}

	public function add() {
		$this->copyFrom('POST');
		$this->save();
	}

	public function edit($id) {
		$this->load(array('id=?',$id));
		$this->copyFrom('POST',function($val) {
			// the 'POST' array is passed to our callback function
			return array_intersect_key($val, array_flip(array('challengeName','type')));
		});
		$this->update();
	}

	public function delete($id) {
		$lastInsertID = $this->get('_id');
		$this->load(array('id=?',$id));
		$this->erase();
		$this->db->exec(
			'ALTER TABLE challenge AUTO_INCREMENT = '.intval($lastInsertID)
		);
	}
}