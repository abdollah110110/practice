<?php
spl_autoload_register( function($class) {
	$classes = realpath( __DIR__ . '/classes/' . $class . '.php' );
	$models = realpath( __DIR__ . '/classes/models/' . $class . '.php' );
	if ( file_exists( $classes ) ) {
		require_once $classes;
	}
	elseif ( file_exists( $models ) ) {
		require_once $models;
	}
	else {
		exit( 'Error in \'init.php\' file: not found the class: ' . $class );
	}
} );
