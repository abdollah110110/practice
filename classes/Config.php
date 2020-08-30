<?php
class Config {

	private $config;

	public function __construct() {
		$file = realpath( dirname( dirname( __FILE__ ) ) . '/config.php' );
		if ( file_exists( $file ) ) {
			require_once $file;
			$this->config = $config;
		}
		else{
			exit('Not found config file.');
		}
	}

	public function __get( $name ) {
		return isset( $this->config[ $name ] ) ? $this->config[ $name ] : null;
	}

}
