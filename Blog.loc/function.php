<?php

use Classes\ConnectDb;
use Classes\Article;
use Classes\UserTools;
use Classes\User;

session_start();

require_once 'viewTitleFunction.php';
//require_once 'dbConnectFunction.php';

spl_autoload_register(function ($class) {
	// project-specific namespace prefix
	$prefix = 'Classes\\';
	// base directory for the namespace prefix
	$base_dir = __DIR__ . '/Classes/';
	$len = strlen($prefix);

	if (strncmp($prefix, $class, $len) !== 0) {
		return;
	}

	$relative_class = substr($class, $len);
	$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

	if (file_exists($file)) {
		require $file;
	}
});

$articleManager = new Article(ConnectDb::getConnect());