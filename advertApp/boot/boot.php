<?php

//Register autoload function
spl_autoload_register(function($class) {
	$class = str_replace("\\", "/", $class);
	require_once sprintf($_SERVER["DOCUMENT_ROOT"].'/advertApp/App/%s.php', $class);
});