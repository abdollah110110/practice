<?php
spl_autoload_register( function($class) {
	$classes = realpath( __DIR__ . '/classes/' . $class . '.php' );
	$models = realpath( __DIR__ . '/classes/models/' . $class . '.php' );
	$controllers = realpath( __DIR__ . '/classes/controllers/' . $class . '.php' );
	if ( file_exists( $classes ) ) {
		require_once $classes;
	}
	elseif ( file_exists( $models ) ) {
		require_once $models;
	}
	elseif ( file_exists( $controllers ) ) {
		require_once $controllers;
	}
	else {
		exit( 'Error in \'init.php\' file: not found the class: ' . $class );
	}
} );
Session::start();
Session::regenerateId();
