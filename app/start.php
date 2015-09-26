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
