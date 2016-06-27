<?php

/**
 * Register the application directories.
 */

Biome\Biome::registerDirs(array(
	'commands'		=> __DIR__ . '/commands/',
	'controllers'	=> __DIR__ . '/controllers/',
	'models'		=> __DIR__ . '/models/',
	'views'			=> __DIR__ . '/views/',
	'components'	=> __DIR__ . '/components/',
	'collections'	=> __DIR__ . '/collections/',
	'resources'		=> __DIR__ . '/../resources/',
));

Biome\Biome::registerAlias(array(
	'URL'		=> 'Biome\Core\URL',
	'Logger'        => 'Biome\Core\Logger\Logger',
	'Config'	=> 'Biome\Core\Config\Config'
));

Biome\Biome::registerService('view', function() {
	$view = new \Biome\Core\View();
	$view->setTitle('Biome');
	return $view;
});

Biome\Biome::registerService('rights', function() {
	return new \Biome\Core\Rights\FreeRights();
});

Biome\Biome::registerService('config', function() {
	return new \Biome\Core\Config\Handler\EnvConfig();
});

Biome\Biome::registerService('logger', function() {
	return new \Biome\Core\Logger\Handler\FileLogger(__DIR__ . '/../storage/logs/biome.log');
});

// Biome\Biome::registerService('staticcache', function() {
// 	return new \Biome\Core\Cache\StaticCache(__DIR__ . '/../storage/cache/');
// });

Biome\Biome::registerService('mysql', function() {
	$DB = Biome\Core\ORM\Connector\MySQLConnector::getInstance();
	$DB->setConnectionParameters(array(
			'hostname' => Config::get('DB_HOSTNAME', 'localhost'),
			'username' => Config::get('DB_USERNAME', 'biome'),
			'password' => Config::get('DB_PASSWORD', 'biome'),
			'database' => Config::get('DB_DATABASE', 'biome')));

	Biome\Biome::setFinal(function() use($DB) {
		$DB->commit();
	});

	return $DB;
});
