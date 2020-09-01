<?php
class Categories extends DB {

	public function __construct() {
		$this->tableName = strtolower( get_class( $this ) );
	}

	public function selectAll() {
		$this->connect();
		$sql = "SELECT * FROM {$this->tableName} ORDER BY id DESC";
		$this->stmt = $this->pdo->prepare( $sql );
		$this->stmt->execute();
		return $this->stmt->fetchAll( PDO::FETCH_OBJ );
	}

	public function selectWhere( $params = [] ) {
		$this->connect();
		$sql = "SELECT * FROM {$this->tableName} WHERE (id=:id AND active=:active) ORDER BY id DESC";
		$this->stmt = $this->pdo->prepare( $sql );
		$this->stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
		$this->stmt->bindParam(':active', $params['active'], PDO::PARAM_INT);
		$this->stmt->execute();
		return $this->stmt->fetchAll( PDO::FETCH_OBJ );
	}

}
