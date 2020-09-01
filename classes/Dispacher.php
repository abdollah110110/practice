<?php
class Dispacher {

	/**
	 * This method checks if there is a controller and action, creates an object of the controller class
	 * and calls the action and sends the parameters to the action, otherwise it gives an error message.
	 *
	 * @global controllerClass $app Is a global variable
	 * @param type $configs Basic settings
	 * @param type $router Returns the name of the controller and the action and parameters
	 * @throws Exception Contains an error message
	 */
	public static function dispach( $router ) {
		global $app;
		$config = Loader::load( 'Config' );
		$controller = ucfirst( $router->getController() ); // Site
		$controllerClass = "{$controller}Controller"; // SiteController
		$actionName = $router->getAction();
		$action = 'action' . $actionName; // actionindex
		$params = $router->getParams();
		$controllerFile = "classes/controllers/{$controllerClass}.php";
		if ( ! file_exists( $controllerFile ) ) {
			throw new Exception( "Error Controller: {$controller} not found." );
		}
		require_once $controllerFile;
		$app = new $controllerClass();
		if ( ! method_exists( $app, $action ) ) {
			throw new Exception( "Error Action: Not found action {$actionName} in {$controllerClass}" );
		}
		$app->$action( $params );
	}

}
