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
	'Logger'        => 'Biome\Core\Logger\Logger',
));

Biome\Biome::registerService('view', function() {
	$view = new \Biome\Core\View();
	$view->setTitle('Biome');
	return $view;
});

Biome\Biome::registerService('rights', function() {
	return new \Biome\Core\Rights\FreeRights();
});

// Biome\Biome::registerService('staticcache', function() {
// 	return new \Biome\Core\Cache\StaticCache(__DIR__ . '/../storage/cache/');
// });

Biome\Biome::registerService('mysql', function() {
	$DB = Biome\Core\ORM\Connector\MySQLConnector::getInstance();
	$DB->setConnectionParameters(array(
			'hostname' => 'localhost',
			'username' => 'biome',
			'password' => 'biome',
			'database' => 'biome'));

	Biome\Biome::setFinal(function() use($DB) {
		$DB->commit();
	});

	return $DB;
});
