<?php
require_once realpath( __DIR__ . '/init.php' );
try {
	$config = Loader::load( 'Config' );
	$router = Loader::load( 'Router' );
	Dispacher::dispach($router);
}
catch ( Exception $exc ) {
	exit( $exc->getMessage() );
}
