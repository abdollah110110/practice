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

	public function select( $fields = null ) {
		if ( is_null( $fields ) ) {
			return "SELECT * FROM " . $this->tableName;
		}
		elseif ( is_array( $fields ) ) {
			$sql = "SELECT ";
			foreach ( $fields as $field ) {
				$sql .= $field . ',';
			}
			$sql = substr( $sql, 0, -1 );
			$sql .= " FROM " . $this->tableName;
			return $sql;
		}
	}

	public function where( $operator = [] ) {
		if ( is_array( $operator ) ) {
			$sql = " WHERE (";
			foreach ( $operator as $field => $operator ) {
				$sql .= "{$field}{$operator}:{$field} AND ";
			}
			$sql = substr( $sql, 0, -5 );
			$sql .= ")";
			return $sql;
		}
		else {
			echo "You must send to 'conditionOperator' parameter, an array contain key and value example ['active' => 1]";
			exit();
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

	public function bind( $sql, $params = [] ) {
		$this->stmt = $this->pdo->prepare( $sql );
		if ( count( $params )>0 ) {
			foreach ( $params as $field => $value ) {
				$this->stmt->bindParam( ":{$field}", $value, $this->pdoParamType( $value ) );
			}
		}
		$this->stmt->execute();
	}

	/**
	 * @param type $operator The name of the field and operator from which the conditions are calculated : ['active' => '=']
	 * @param type $params The name of the field and the value to which the calculation of the conditions must apply : ['active' => 1]
	 * @return type Returns one or more records
	 */
	public function findAll( $operator = [], $params = [] ) {
		$this->connect();
		$sql = $this->select();
		if ( count( $operator ) > 0 ) {
			$sql .= $this->where( $operator );
		}
		$this->bind( $sql, $params );
		return $this->stmt->fetchAll( PDO::FETCH_OBJ );
	}

	/**
	 * @param type $fields Fields to be returned from the record
	 * @param type $operator The name of the field and operator from which the conditions are calculated : ['active' => '=']
	 * @param type $params The name of the field and the value to which the calculation of the conditions must apply : ['active' => 1]
	 * @return type Returns one or more records
	 */
	public function findFields( $fields = [], $operator = [], $params = [] ) {
		$this->connect();
		$sql = $this->select( $fields );
		if ( count( $operator ) > 0 ) {
			$sql .= $this->where( $operator );
		}
		$this->bind( $sql, $params );
		return $this->stmt->fetchAll( PDO::FETCH_OBJ );
	}

	public function __destruct() {
		$this->pdo = null;
	}

}
