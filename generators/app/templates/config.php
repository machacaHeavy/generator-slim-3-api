<?php
/*--------------------------------------------------------------------------------------------------------------------------------------------------------
-- Autor: José Gildardo Solis Sánchez
-- Desc.: Archivo de configuración principal
-- Notas: 
-- 		'settings': Siempre debe tener este elemento y debe ser un arreglo con la configuración necesaria.
--		'displayPhpErrors': Debe ser un boleano, indica si se muestran o no los errores de PHP (FALSE para producción, TRUE para desarrollo)
--		'logger': Es la configuración del log de errores. Debe ser un arreglo con los elementos ['prefix', 'extension', 'path'], si estos elementos
--				  no están configurados se les asigna automáticamente un valor por default. Aún así, 'logger' debe estar definido como arreglo.
--		'debugLogger': Es la configuración del log de errores de base de datos, debe ser un arreglo con los elementos ['prefix', 'extension', 'path'],
--					   si no están definidos se les asigna automáticamente un valor por default. Aún así 'debugLogger' debe estar definido como arreglo.
--		'databases': Es un arreglo con la configuración de las bases de datos necesarias, siempre debe estar definido, aunque no contenga ninguna
--					 base de datos.
--
-----------------------------------------------------------------------------------------------------------------------------------------------------------*/
return 
[
	'settings' => 
	[
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
				'database'  => 'slim',
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