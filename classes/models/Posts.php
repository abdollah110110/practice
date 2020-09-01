<?php
class Posts extends DB {

	public function __construct() {
		$this->tableName = strtolower( get_class( $this ));
	}

}
