<?php

namespace <%= folderNamespace %>\Models;


class Index 
{
	private $app; 

	function __construct($app = NULL)
	{
		$this->app = $app;
	}
	
	public function holaMundo()
	{
		
		return "Hola Mundo";

	}

}

?>