<?php

/**
 * This file provides arrays containing datas about Wolflex and Wolfplex Hackerspace
 * Any static field in an API should use these values instead to hardcode them.
 */

//Data related to Wolfplex
$WolfplexData = [
	'name' => 'Wolfplex',
	'oid' => '1.3.6.1.4.1.37822',
];

//Data related to the hackerspace
$HackerspaceData = [
	'name' => 'Wolfplex Hackerspace',
	'logo' => [
		'default' => 'http://www.wolfplex.org/img/logo496.png',
	],
	'mail' => [
		'contact' => 'hackerspace@wolfplex.org',
		'stages' => 'participate@wolfplex.org',
	],
	'places' => [
		'siegeSocial' => [
			'address' => 'Rue de la Science 14 - 6000 Charleroi - Belgium',
			'coords' => [50.4114737, 4.4464617],
		],
		'space' => [
			'address' => '/dev/null',
			'coords' => [50.40603, 4.46884], //Station de métro Pensée as temporary coords
			//'address' => 'Chaussée de Gilly 18 - 6220 Fleurus - Belgium',
			//'coords' => [50.455819, 4.527694], //Lionel place
		],
	],
	'URL' => [
		'default' => 'http://www.wolfplex.org/',
		'api' => 'http://api.wolfplex.org',
		'bitbucket' => 'http://www.bitbucket.org/wolfplex/',
		'github' => 'https://github.com/wolfplex',
		'intranet' => 'http://www.wolfplex.org/members/',
		'IRC' => 'irc://irc.freenode.net/wolfplex/',
		'IRCWebChat' => 'http://irc.lc/wolfplex',
		'ML' => 'http://discuss.hackerspaces.be/listinfo.cgi/wolfplex-hackerspaces.be',
		'print' => 'www.wolfplex.org',
		'projects' => 'http://www.wolfplex.org/wiki/Cat%C3%A9gorie:Project',
		'twitter' => 'http://www.twitter.com/wolfplex',
		'wiki' => 'http://www.wolfplex.org',
		'wikiRecentChangesFeed' => 'http://www.wolfplex.org/w/index.php?title=Sp%C3%A9cial:Modifications_r%C3%A9centes&feed=atom',
	],
	'accounts' => [
		'twitter' => "@Wolfplex",
		'foursquare' => "4df75cd61fc7393b579fcc8e",
	],
	'lists' => [
		'default' => 'wolfplex@discuss.hackerspaces.be',
	],
];
