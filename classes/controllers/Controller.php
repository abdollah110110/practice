<?php
/**
 * Father of all controller
 */
class Controller {

	public $layout = 'main';

	public function config( $name ) {
		return Loader::load('Config')->$name;
	}

	protected function getParam( $paramName, $params ) {
		return (isset( $params[ $paramName ] ) ? $params[ $paramName ] : null);
	}

	protected function loadView( $view, $values = [], $useLayout = true ) {
		extract( $values ); // [ 'id' => 5] output: $id = 5
		$controller = strtolower( substr( get_class( $this ), 0, -10 ) );
		$viewFile = Tools::basePath("views/{$controller}/{$view}.php");
		if ( ! file_exists( $viewFile ) ) {
			throw new Exception( "Error view: '{$view}.php' was not found in views/{$controller} directory." );
		}
		ob_start();
		require $viewFile;
		$content = ob_get_clean() . PHP_EOL;
		if ( $useLayout ) {
			$layoutFile = Tools::basePath("views/layouts/{$this->layout}.php");
			if ( ! file_exists( $layoutFile ) ) {
				throw new Exception( "Error layout: '{$this->layout}.php' was not found in 'views/layouts' directory." );
			}
			require $layoutFile;
		}
		else {
			echo $content;
		}
	}

	public function render( $view, $values = [] ) {
		$this->loadView( $view, $values );
	}

	public function renderPartial( $view, $values = [] ) {
		$this->loadView( $view, $values, false );
	}

	public function renderText( $text ) {
		echo $text;
	}

	public function renderContent( $content ) {
		$layoutFile = Tools::basePath() . "views/layouts/{$this->layout}.php";
		if ( ! file_exists( $layoutFile ) ) {
			throw new Exception( "Error layout: '{$this->layout}.php' was not found in 'views/layouts' directory." );
		}
		require $layoutFile;
	}

}
