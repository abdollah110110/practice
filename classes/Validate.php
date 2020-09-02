<?php
class Validate {

	private $valid;
	private $translate;
	private $errors;

	public function __construct() {
		$this->valid = [
			'required' => ' نمیتواند خالی باشد',
			'email' => ' را درست وارد کنید',
		];
		$this->translate = [
			'email' => 'ایمیل',
			'password' => 'رمز عبور',
		];
	}

	public function __set( $name, $value ) {
		if ( isset( $this->$name ) ) {
			$this->$name = $value;
		}
		else {
			exit( 'Error __set: not found the field' . $name );
		}
	}

	public function __get( $name ) {
		if ( isset( $this->$name ) ) {
			return $this->$name;
		}
		else {
			exit( 'Error __get: not found the field' . $name );
		}
	}

	private function translateCheck( $inputKey ) {
		foreach ( $this->translate as $key => $value ) {
			if ( $inputKey == $key ) {
				return $value;
			}
		}
		throw new Exception( 'Not found ' . $key . ' in this translate array.' );
	}

	private function required( $fieldValue ) {
		if ( empty( $fieldValue ) ) {
			return false;
		}
		return true;
	}

	private function email( $fieldValue ) {
		if ( ! filter_var( $fieldValue, FILTER_VALIDATE_EMAIL ) ) {
			return false;
		}
		return true;
	}

	private function escape( $value ) {
		$value = trim( $value );
		$value = stripslashes( $value );
		$value = htmlspecialchars( $value );
		return $value;
	}

	public function errorCheck( $inputKey, $inputValue, $arrayParams = [] ) {
		foreach ( $arrayParams as $value ) {
			if ( $value == 'required' ) {
				if ( $this->required( $inputValue ) == false ) {
					$this->errors[ $inputKey ] = $this->translateCheck( $inputKey ) . $this->valid[ 'required' ];
					return;
				}
			}
			$inputValue = $this->escape( $inputValue );
			if ( $value == 'email' ) {
				if ( $this->email( $inputValue ) == false ) {
					$this->errors[ $inputKey ] = $this->translateCheck( $inputKey ) . $this->valid[ 'email' ];
					return;
				}
			}
		}
	}

}
