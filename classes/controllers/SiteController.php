<?php
class SiteController extends Controller {

	public function actionIndex() {
		$categories = (new Categories())->selectAll();
		$this->render( 'index', compact( 'categories' ) );
	}

}
