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
			switch ( true ) {
				case is_null($value) :
					$type = PDO::PARAM_NULL;
					break;

				case is_int($value) :
					$type = PDO::PARAM_INT;
					break;

				case is_bool($value) :
					$type = PDO::PARAM_BOOL;
					break;

				default : 
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
		// var_dump($this->stmt);

	}

	public function execute(){
		$this->stmt->execute();
	}

	public function resultAll(){
		$this->execute();
		// var_dump($this->execute);
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function result(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

}