<?php

// Composer deps
require '../vendor/autoload.php';

// log4php configuration
if (isset($_SERVER['LOGGER_CONFIG']) && file_exists($_SERVER['LOGGER_CONFIG'])) {
	Logger::configure($_SERVER['LOGGER_CONFIG']);
}
