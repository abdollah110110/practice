<?php
class Tools {

	public static function pre( $value, $exit = true ) {
		if ( is_array( $value ) ) {
			echo '<div style="background:#eee;padding:10px;">';
			echo '<pre>' . print_r( $value, true ) . '</pre>' . PHP_EOL;
			echo '</div><br />' . PHP_EOL;
		}
		elseif ( is_object( $value ) ) {
			echo '<div style="background:#eee;padding:10px;">';
			echo '<pre>' . print_r( $value, true ) . '</pre>' . PHP_EOL;
			echo '</div><br />' . PHP_EOL;
		}
		else {
			echo '<div style="background:#eee;padding:10px;">';
			echo '<pre>' . $value . '</pre>' . PHP_EOL;
			echo '</div><br />' . PHP_EOL;
		}
		if ( $exit ) {
			exit();
		}
	}

	public static function basePath( $path = '' ) {
		return realpath( str_replace( '\\', '/', dirname( __DIR__ ) . '/' . $path ) );
	}

	public static function url() {
		return Loader::load( 'Config' )->homeUrl;
	}

	public static function encode( $string ) {
		return htmlentities( $string, ENT_QUOTES, 'utf-8' );
	}

}
