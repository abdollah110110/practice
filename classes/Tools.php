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

	public static function escape( $value ) {
		$value = trim( $value );
		$value = stripslashes( $value );
		$value = htmlspecialchars( $value );
		return $value;
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

	/**
	 * @param type $text Is a text that the method must return part of
	 * @param type $len Number of words to be returned and its default value is 50
	 * @return type Is a text or string of words
	 */
	public static function getSubstr( $text, $len = 50 ) {
		$array = explode( ' ', $text );
		$sub = '';
		if ( $len <= count( $array ) ) {
			for ( $i = 0; $i < $len; $i ++ ) {
				$sub .= $array[ $i ] . ' ';
			}
			$sub .= '...';
		}
		else {
			$sub = $text;
		}
		return self::escap( $sub );
	}

	/**
	 * If we do not enter the URL, we will be redirected to the main page of the site
	 * Redirect to a given url
	 * @param string $url The url to follow
	 */
	public static function redirect( $href = '' ) {
		$url = self::url($href);
		header( 'Location: ' . $url );
		exit( '<meta http-equiv="refresh" content="0;url=' . $url . ' />' );
	}

}
