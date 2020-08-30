<?php
require_once realpath( __DIR__ . '/init.php' );
try {
	$config = Loader::load( 'Config' );
	$db = Loader::load( 'DB' );
	$cat = Loader::load( 'Categories' );
	$result = $cat->findAll();
	Tools::pre($result);
}
catch ( Exception $exc ) {
	exit( $exc->getMessage() );
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $config->title; ?></title>
    </head>
    <body>
    </body>
</html>
