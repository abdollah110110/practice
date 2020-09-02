<?php
class DB {

	protected $pdo;
	protected $tableName;
	protected $stmt;

	public function connect() {
		$config = Loader::load( 'Config' );
		$attributes = [
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			PDO::ATTR_ERRMODE,
			PDO::ERRMODE_EXCEPTION
		];
		try {
			$this->pdo = new PDO( "mysql:dbname={$config->dbName};host={$config->dbHost}", $config->dbUser, $config->dbPassword, $attributes );
		}
		catch ( PDOException $e ) {
			exit( 'Error database connection: ' . $e->getMessage() );
		}
	}

	public function pdoParamType( $value ) {
		switch ( true ) {
			case is_bool( $value ):
				$value_type = PDO::PARAM_BOOL;
				break;
			case is_int( $value ):
				$value_type = PDO::PARAM_INT;
				break;
			case is_null( $value ):
				$value_type = PDO::PARAM_NULL;
				break;
			default:
				$value_type = PDO::PARAM_STR;
		}
		return $value_type;
	}

	public function selectAll() {
		$this->connect();
		$sql = "SELECT * FROM {$this->tableName} ORDER BY id DESC";
		$this->stmt = $this->pdo->prepare( $sql );
		$this->stmt->execute();
		return $this->stmt->fetchAll( PDO::FETCH_OBJ );
	}

	public function __destruct() {
		$this->pdo = null;
	}

}
