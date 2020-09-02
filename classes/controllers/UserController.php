<?php
class UserController extends Controller {

	public function actionRegister() {
		$this->render( 'register' );
	}

	public function actionLogin() {
		if ( isset( $_POST[ 'email' ] ) && isset( $_POST[ 'password' ] ) ) {
			$validate = new Validate();
			$validate->errorCheck( 'email', $_POST[ 'email' ], [ 'required', 'email' ] );
			$validate->errorCheck( 'password', $_POST[ 'password' ], [ 'required' ] );
			if ( isset( $validate->errors ) && count( $validate->errors ) > 0 ) {
				Session::set( 'errors', $validate->errors );
				Tools::redirect( 'user/login' );
			}
			$email = Tools::escape( $_POST[ 'email' ] );
			$password = $_POST[ 'password' ];
			$user = (new Users() )->selectEmail( [ 'email' => $email, 'active' => 1 ] );
			if( password_verify( $password, $user->password )){
				Session::set('login', true);
				Session::set('userid', $user->id);
				Session::set('username', $user->name);
				Session::set('isadmin', $user->is_admin);
				Tools::redirect();
			}
		}
		$this->render( 'login' );
	}

}
