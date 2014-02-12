<?php

/**
 * Wolfplex Kiba One design available accents
 *
 * Outputs an array of accents:
 * name:    		accent name
 * accent:  		background color
 * headingColor:	text color
 */

require('KibaOneAccents.php');

///
/// Prepares API resources
///

$accents = [];
foreach (KibaOneAccents::getAccents() as $accent) {
	$accents[] = [
		'name'         => $accent[0],
		'accent'       => $accent[1],
		'headingColor' => $accent[2]
	];
}

///
/// API output
///

header("Content-Type: application/json");
echo json_encode($accents, JSON_PRETTY_PRINT);
