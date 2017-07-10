<?php

switch($_SERVER['HTTP_HOST'])
{
	//Local
	case 'localhost': 	
			$webRoot = 'http://'.$_SERVER['HTTP_HOST'].'/fsalinas/webmaster'; 
			$web_root_p = 'http://'.$_SERVER['HTTP_HOST'].'/fsalinas'; 
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/fsalinas/webmaster';
			$webRootImg = 'http://'.$_SERVER['HTTP_HOST'].'/fsalinas/images'; 
			$docRootImg = $_SERVER['DOCUMENT_ROOT'].'/fsalinas/images';
			$docRootImg1 = $_SERVER['DOCUMENT_ROOT'].'/fsalinas/';  
			$sqlUser = 'root'; 
			$sqlPw = ''; 
			$sqlHost = 'localhost'; 
			$sqlDb = 'farmacia_fsalinas';
		break;
	//Produccion
	default:	
			$webRoot = 'http://'.$_SERVER['HTTP_HOST'].'/webmaster'; 
			$web_root_p = 'http://'.$_SERVER['HTTP_HOST'].''; 
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/webmaster';
			$webRootImg = 'http://'.$_SERVER['HTTP_HOST'].'/images';  
			$docRootImg = $_SERVER['DOCUMENT_ROOT'].'/images';
			$docRootImg1 = $_SERVER['DOCUMENT_ROOT'].'/';
			$rutaDocumento =  'http://'.$_SERVER['HTTP_HOST'].'/webmaster';
			$rutaPortada =   'http://'.$_SERVER['HTTP_HOST'].'/webmaster';
			$sqlUser = 'farmacia_fsalina'; 
			$sqlPw = 'cfN(Lk&tX8X,'; 
			$sqlHost = 'localhost'; 
			$sqlDb = 'farmacia_fsalinas';
		break;
}

/** RUTAS GENERALES **/

define('DOC_ROOT', $docRoot);
define('DOC_ROOT_IMG', $docRootImg);
define('DOC_ROOT_IMG1', $docRootImg1);
define('WEB_ROOT_IMG', $webRootImg);
define('WEB_ROOT', $webRoot);
define('WEB_ROOT_P', $web_root_p);

/** BASE DE DATOS **/

define('SQL_HOST', $sqlHost);
define('SQL_DATABASE', $sqlDb);
define('SQL_USER', $sqlUser);
define('SQL_PASSWORD', $sqlPw);

define('USER_PAC', '');
define('PW_PAC', '');

define('ITEMS_PER_PAGE', '20');

/** NOMBRE DEL SISTEMA **/
define('PROJECT_NAME', 'WEBMASTER ::.');
define('FOOTER', date('Y').' <small>Creado por Arista Soluciones</small> ');
/* TIPOS DE  ARCHIVOS PERMITIDOS AL SUBIR IMAGEN */
$archivos_permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");

/* TAMAÑO LIMITE DE ARCHIVO A SUBIR */
$limite_kb = 16384;


?>