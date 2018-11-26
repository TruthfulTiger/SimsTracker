<?php

class Household extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
		parent::__construct($db,'household');
	}

	public function all() {
		$this->load();
		return $this->query;
	}

	public function getById($id) {
		$this->load(array('hhID=?',$id));
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
		$this->load(array('name=?',$id));
		return $this->query;
	}

	public function add() {
		$this->copyFrom('POST');
		$this->save();
	}

	public function edit($id) {
		$this->load(array('hhID=?',$id));
		$this->copyFrom('POST');
		$this->update();
	}

	public function delete($id) {
		$lastInsertID = $this->get('_id');
		$this->load(array('hhID=?',$id));
		$this->erase();
		$this->db->exec(
			'ALTER TABLE household AUTO_INCREMENT = '.intval($lastInsertID)
		);
	}
}