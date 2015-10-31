#!/usr/bin/php
<?php

/**
 * Activate the autoload.
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Load parameters.
 */
require_once __DIR__ . '/app/start.php';

/**
 * Start the app!
 */
Biome\Biome::shell();
