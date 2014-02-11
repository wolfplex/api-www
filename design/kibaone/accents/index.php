<?php

/**
 * Wolfplex Kiba One design available accents
 *
 * Outputs an array of accents:
 * name:    		accent name
 * accent:  		background color
 * headingColor:	text color
 */

$white = '#ffffff'; //We currently don't consider a grayish white for cyan compliance.
$black = '#000000'; //We currently don't consider a dark gray for citron compliance.
$defaultHeadingsColor = $white;

$accents = [
	// Main colors
	[ 'black', '#000000', '#4b4b50' ],
	[ 'zedgray', '#343434' ],
	[ 'bluegray', '#4b4b50' ],

	// Colored accents
	[ 'cyan', '#2ba6cb' ],
	[ 'lime', '#e7fb03', $black ],
	[ 'magenta', '#f608b0' ],
	[ 'craie', '#f3f3f3', $black ],
	[ 'grenade', '#f34723' ],
	[ 'sorbier', '#fb8507' ],
	[ 'purple', '#998cfb' ],
	[ 'citron', '#fcff00', $black ],
	[ 'blueribbon', '#1d62ff' ],
	[ 'red', '#f60000' ],
];

$areas = [];
foreach ($accents as $accent) {
	$areas[] = [
		'name'         => $accent[0],
		'accent'       => $accent[1],
		'headingColor' => count($accent) < 3 ? $defaultHeadingsColor : $accent[2]
	];
}

header("Content-Type: application/json");
echo json_encode($areas, JSON_PRETTY_PRINT);
