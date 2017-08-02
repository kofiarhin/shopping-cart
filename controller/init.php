<?php 

	define('APPLICATION_PATH', realpath('../'));

	$paths = array(

			APPLICATION_PATH,
			APPLICATION_PATH.'\model',
			APPLICATION_PATH.'\controller',
			get_include_path()
		);

	set_include_path(implode(PATH_SEPARATOR, $paths));

	function __autoload($class_name) {

		require_once $class_name.".php";
	}
 ?>