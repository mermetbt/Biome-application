<?php

define('APP_DIR', __DIR__ . '/../');

/**
 * Activate the autoload.
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Load parameters.
 */
require_once __DIR__ . '/../app/start.php';

\Biome\Biome::tests();
