<?php 

class Database{
	private $host = HOST;
	private $username = USERNAME;
	private $password = PASS;
	private $dbName = DB_NAME;

	private $stmt, $dbh;
	function __construct(){
		$dsn = 'mysql:host='. $this->host .';dbname='. $this->dbName .';';
		$ops = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try{
			$this->dbh = new PDO($dsn, $this->username, $this->password, $ops);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null){
		if ( is_null($type) ) {
			if ( is_int($type) ) {
				$type = PDO::PARAM_INT;
			}else if ( is_bool($type) ) {
				$type = PDO::PARAM_BOOL;
			}else if ( is_null($type) ) {
				$type = PDO::PARAM_NULL;
			}else {
				$type = PDO::PARAM_STRING;
			}

			$this->stmt->bindValue($param, $value, $type);
		}
	}

	public function execute(){
		$this->stmt->execute();
	}

	public function resultAll(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function result(){
		$this->execute();
		$this->stmt->fetch(PDO::FETCH_ASSOC);
	}

}