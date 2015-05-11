<?php

// Composer deps
define('AUTOLOAD', '../vendor/autoload.php');
if (!file_exists(AUTOLOAD)) {
	die("Please install Composer if needed, then run 'make' or directly 'composer install'.");
}
require AUTOLOAD;

// log4php configuration
if (isset($_SERVER['LOGGER_CONFIG']) && file_exists($_SERVER['LOGGER_CONFIG'])) {
	Logger::configure($_SERVER['LOGGER_CONFIG']);
}
