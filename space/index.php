<?php
include("../_includes/CommonData.php");
include("../_includes/HackerspaceOpenStatus.php");

$status = get_hackerspace_open_status();
$document = [
	'api' => '0.13',
	'cache' => [
		'schedule' => 'm.02', //Cache duration: 2 minutes
	],
	'space' => $HackerspaceData['name'],
	'logo' => $HackerspaceData['logo']['default'],
	'url' => $HackerspaceData['URL']['default'],
	'location' => [
		'address' => $HackerspaceData['places']['space']['address'],
		'lat' => $HackerspaceData['places']['space']['coords'][0],
		'lon' => $HackerspaceData['places']['space']['coords'][1],
	],
	'spacefed' => [
		'spacenet' => false,
		'spacesaml' => false,
		'spacephone' => false,
	],
	'state' => [
		'open' => $status->IsOpen(),
		'lastchange' => $status->date,
		'trigger_person' => $status->who,
		'message' => $status->comment,
	],
	'contact' => [
		'irc' => $HackerspaceData['URL']['IRC'],
		'twitter' => $HackerspaceData['accounts']['twitter'],
		'foursquare' => $HackerspaceData['accounts']['foursquare'],
		'ml' => $HackerspaceData['lists']['default'],
		'email' => $HackerspaceData['mail']['contact'],
		'issue_mail' => base64_encode('spike@wolfplex.home.kg'),
	],
	'issue_report_channels' => [
		'twitter',
		'issue_mail',
	],
	'projects' => [
		$HackerspaceData['URL']['projects'],
		$HackerspaceData['URL']['github'],
		$HackerspaceData['URL']['bitbucket'],
	],
	'feeds' => [
		'wiki' => [
			'type' => 'atom',
			'url' => $HackerspaceData['URL']['wikiRecentChangesFeed'],
		]
	],

/*
We can add sensors information (e.g. temperature, humidity, amount of Club-Mate left, …).
See http://spaceapi.net/documentation#documentation-ref-13-root-sensors.

If we add webcam feeds:
	'cam' => [
		'URL1',
		'URL2',
	]

If we stream something:
	'stream' => [
		'm4' => '',
		'mjpeg' => '',
		'ustream' => '',
		'ext_OURFORMAT' => '',
		'ext_OURFORMAT2' => '', //should be prefixed with ext_
	]

If we want to share events:
	'events' => [
		[
			'name' => '', //Name or other identity of the subject (e.g. J. Random Hacker, fridge, 3D printer, …)
			'type' => '', //check-in, check-out, finish-print, …
			'timestamp' => time(), //unixtime
			'extra' => '', //more info
		],
		//...
	]
 */
];

echo json_encode($document);

?>
