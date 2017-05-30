<?php

namespace <%= folderNamespace %>\Controllers;

use <%= folderNamespace %>\Models\Index;

class IndexController
{
	private static $app;

	public function __construct($app)
	{
		self::$app = $app;

		$app->get('[/]', function($req, $res){ return self::get($req, $res); })->setName('/');

		$app->get('/api[/]', function($req, $res){ return self::get($req, $res); })->setName('/api');

		$app->get('/api/holamundo[/]', function($req, $res){ return self::holaMundo($req, $res); })->setName('/api/holamundo');

	}

	private static function get($request, $response)
	{

		$routes = self::$app->getContainer()
							->get('router')
							->getRoutes();

		$uri 	= NULL;

		$method = NULL;

		$data   = array();

		foreach( $routes as $route )
		{
			$uri 	= $route->getName();
			$method = $route->getMethods()[0];
			$data[] = [
				'resource' => $uri,
				'method'   => $method
			];
		}
		
		$response->set(['resources' => $data]);
	}

	private static function holaMundo($request, $response)
	{
		$im = new Index();
		$response->set(['saludo' => $im->holaMundo()]);
	}
}

?>