<?php

// Composer deps
define('AUTOLOAD', '../vendor/autoload.php');
if (!file_exists(AUTOLOAD)) {
	die("Please install Composer if needed, then run 'make' or directly 'composer install'.");
}
require AUTOLOAD;

// Turns all PHP errors into exceptions
// See http://stackoverflow.com/a/1241751/1930997
set_error_handler(function ($errno, $errstr, $errfile, $errline, array $errcontext) {
	// Error suppressed with the @-operator shouldn't transformed in exceptions.
	if (error_reporting() === 0) {
		return false;
	}

	throw new ErrorException(trim($errstr), 0, $errno, $errfile, $errline);
});

// log4php configuration
if (isset($_SERVER['LOGGER_CONFIG']) && file_exists($_SERVER['LOGGER_CONFIG'])) {
	Logger::configure($_SERVER['LOGGER_CONFIG']);
}
