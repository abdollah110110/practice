<?php
class Tools {

	public static function pre( $value, $exit = true ) {
		if ( is_array( $value ) ) {
			echo '<div style="background:#eee;padding:10px;">';
			echo '<pre>' . self::encode( print_r( $value, true ) ) . '</pre>' . PHP_EOL;
			echo '</div><br />' . PHP_EOL;
		}
		elseif ( is_object( $value ) ) {
			echo '<div style="background:#eee;padding:10px;">';
			echo '<pre>' . self::encode( print_r( $value, true ) ) . '</pre>' . PHP_EOL;
			echo '</div><br />' . PHP_EOL;
		}
		else {
			echo '<div style="background:#eee;padding:10px;">';
			echo '<pre>' . self::encode( $value ) . '</pre>' . PHP_EOL;
			echo '</div><br />' . PHP_EOL;
		}
		if ( $exit ) {
			exit();
		}
	}

	public static function basePath( $path = '' ) {
		$path = Loader::load( 'Config' )->basePath . $path;
		return realpath( $path );
	}

	public static function url( $href = '' ) {
		return Loader::load( 'Config' )->homeUrl . $href;
	}

	public static function encode( $string ) {
		return htmlentities( $string, ENT_QUOTES, 'utf-8' );
	}

	/**
	 * @global type $config The global variable includes the project settings
	 * @param type $format It is a string that takes the form of time
	 * @param type $timestamp Current or string time stamp
	 * @return type A string containing the date format
	 */
	public static function getDate( $timestamp = '', $format = '' ) {
		date_default_timezone_set( Loader::load( 'Config' )->timezone );
		$format = ($format == '' ? 'H:i:s Y/m/d l' : $format);
		if ( $timestamp == '' ) {
			return date( $format );
		}
		return date( $format, strtotime( $timestamp ) );
	}

}
