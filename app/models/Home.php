<?php 

class UserModel {
	private $tabel = 'tabel';
	private $db;

	function __construct(){
		$this->db = new Database;
	}

	/*
	* Example
	*/
	// public function getAll(){
	// 	$this->db->query('SELECT * FROM ' . $this->tabel);
	// 	return $this->db->resultAll();
	// }
}