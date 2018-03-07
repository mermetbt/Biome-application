<?php

/**
 * Measure execution time.
 */
$_microtime_start = microtime(TRUE);
Biome\Biome::setFinal(function() {
	global $_microtime_start;
	$stop = microtime(TRUE);
	$exec = $stop - $_microtime_start;
	Logger::info('Execution time: ' . $exec);
	return;
});

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
	'Auth'		=> 'Biome\Core\Auth',
	'URL'		=> 'Biome\Core\URL',
	'Logger'	=> 'Biome\Core\Logger\Logger',
	'Collection' => 'Biome\Core\Collection',
	'Config'	=> 'Biome\Core\Config\Config'
));

/**
 * Services registration.
 */

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
	return new \Biome\Core\Logger\Handler\FileLogger(__DIR__ . '/../storage/logs/biome-' . date('Y-m-d') . '.log');
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

	$DB->query('SET NAMES \'utf8mb4\';');

	return $DB;
});


/**
 * Define the execution errors handler.
 */
if(Config::get('WHOOPS_ERROR', TRUE))
{
	Biome\Core\Error::setHandler(new Biome\Core\Error\Handler\WhoopsHandler());
}
