<?php
defined('ROOT_PATH') or exit('Restricted');
return 
[
	'settings' => 
	[
		'displayErrorDetails' => false,
		'addContentLengthHeader' => true,
		'determineRouteBeforeAppMiddleware' => true,
		'displayPhpErrors' => true,
		'logger' => [
			'prefix' 	=> 'app_',
			'extension' => 'log',
			'path' 		=> 'logs/'
		],
		'debugLogger' => [
			'prefix' 	=> 'debug_',
			'extension' => 'log',
			'path' 		=> 'logs/debug/'
		],
		'databases'  => [
			'slimDB' =>
			[		
				'driver'    => 'mysql',
				'host'      => 'localhost',
				'database'  => '',
				'username'  => 'root',
				'password'  => '',
				'prefix'    => '',
				'charset'   => 'utf8',
				'collation' => 'utf8_general_ci',
				'port' 		=> '3306'
			]
		]
	]
];

?>