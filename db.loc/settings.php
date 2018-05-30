<?php

use Class\ConnectDbtest;
use Class\Articletest;
use Class\Usertest;

spl_autoload_register(function ($class) {
	// project-specific namespace prefix
	$prefix = 'Class\\';
	// base directory for the namespace prefix
	$base_dir = __DIR__ . '/Class/';
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

$articleManager = new Articletest(ConnectDbtest::getConnect());

$arr = [' hello ', ' \\" hi  \'  ', '&name', '&'];

$someArr = ['name' => ' \\lelik', 'last_name' => 'lastName   ', 'login' => 'login  \\',
            'email' => 'email',
            'pass' => 'password',
            'role' => 'role'];

$newUser = new Usertest(ConnectDbtest::clean($someArr));
$newUser->print();