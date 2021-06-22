<?php 

class ExamModel {
	private $tabel = 'posts';
	private $db;

	function __construct(){
		$this->db = new Database;
	}

	/*
	* Example
	*/
	public function getAll(){
		$this->db->query('SELECT * FROM ' . $this->tabel);
		// var_dump($this->db);
		return $this->db->resultAll();
	}

	public function getPosts($id){
		$this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE thumb_id=:thumb_id');
		$this->db->bind('thumb_id', $id);
		return $this->db->result();
	}
}