<?php
class Users extends DB {

	public function __construct() {
		$this->tableName = strtolower( get_class( $this ) );
	}

	public function selectEmail( $params = [] ) {
		$this->connect();
		$sql = "SELECT * FROM {$this->tableName} WHERE (email=:email AND active=:active) LIMIT 1";
		$this->stmt = $this->pdo->prepare( $sql );
		$this->stmt->bindParam( ':email', $params[ 'email' ], PDO::PARAM_STR );
		$this->stmt->bindParam( ':active', $params[ 'active' ], PDO::PARAM_INT );
		$this->stmt->execute();
		$result = $this->stmt->fetchAll( PDO::FETCH_OBJ );
		return $result[ 0 ];
	}

	public function check() {
		if ( Session::get( 'login' ) !== null && Session::get( 'login' ) == true ) {
			return true;
		}
		return false;
	}

	public function userId() {
		if ( Session::get( 'userid' ) !== null ) {
			return Session::get( 'userid' );
		}
	}

	public function userName() {
		if ( Session::get( 'username' ) !==null ) {
			return Session::get( 'username' );
		}
	}

	public function isAdmin() {
		if ( Session::get( 'isadmin' ) !== null && Session::get( 'isadmin' ) === true ) {
			return true;
		}
		return false;
	}

}
