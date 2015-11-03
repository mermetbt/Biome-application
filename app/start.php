<?php

/**
 * Register the application directories.
 */

Biome\Biome::registerDirs(array(
	'controllers'	=> __DIR__ . '/controllers/',
	'models'		=> __DIR__ . '/models/',
	'views'			=> __DIR__ . '/views/',
	'components'	=> __DIR__ . '/components/',
	'collections'	=> __DIR__ . '/collections/',
));

Biome\Biome::registerAlias(array(
	'URL'		=> 'Biome\Core\URL',
));

Biome\Biome::registerService('view', function() {
	$view = new \Biome\Core\View();
	$view->setTitle('Biome');
	return $view;
});

Biome\Biome::registerService('mysql', function() {
	$DB = Biome\Core\ORM\Connector\MySQLConnector::getInstance();
	$DB->setConnectionParameters(array(
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => 'biome'));

//	$DB->setQueryLogger();

	Biome\Biome::setFinal(function() use($DB) {
		$DB->commit();
//		$queries = $DB->getQueriesLog();
// 		echo '<pre>';
//		echo 'Queries:', PHP_EOL;
//		print_r($queries);
	});

	return $DB;
});
