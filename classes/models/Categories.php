<?php
class Categories extends DB {

	public function __construct() {
		$this->tableName = get_class( $this );
	}

}
