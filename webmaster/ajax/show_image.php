<?php

  
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

/*	session_start();
    phpinfo();
    exit;*/

	$producto->setId($_GET["id"]);
	$info = $producto->Info();

	header("Content-type:".$info["tipo"]);
    echo $info["imagen"];

    ?>