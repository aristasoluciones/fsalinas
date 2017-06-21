<?php
switch($_SERVER['HTTP_HOST'])
{
	//Local
	case 'localhost':

            // echo "addd"; exit;
			$webRoot = 'http://'.$_SERVER['HTTP_HOST'].'/fsalinas'; 
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/fsalinas'; 
			$sqlUser = 'root'; 
			$sqlPw = ''; 
			$sqlHost = 'localhost'; 
			$sqlDb = 'farmacia_fsalinas';
		break;
	
	//Produccion
	default:	
	        
			$webRoot = 'http://'.$_SERVER['HTTP_HOST'].''; 
			$docRoot = $_SERVER['DOCUMENT_ROOT'].'/'; 
			$rutaDocumento =  'http://'.$_SERVER['HTTP_HOST'].'';
			$rutaPortada =   'http://'.$_SERVER['HTTP_HOST'].'';
			$sqlUser = 'farmacia_fsalina'; 
			$sqlPw = 'cfN(Lk&tX8X,'; 
			$sqlHost = 'localhost'; 
			$sqlDb = 'farmacia_fsalinas';
		break;
}

/** RUTAS GENERALES **/

define('DOC_ROOT', $docRoot);
define('WEB_ROOT', $webRoot);

/** BASE DE DATOS **/

define('SQL_HOST', $sqlHost);
define('SQL_DATABASE', $sqlDb);
define('SQL_USER', $sqlUser);
define('SQL_PASSWORD', $sqlPw);

/** SMTP **/

define('SMTP_HOST','mail.aristasoluciones.com');
define('SMTP_PORT',25);
define('SMTP_USER','contacto@aristasoluciones.com');
define('SMTP_PASS','123456789abc');

define('USER_PAC', '');
define('PW_PAC', '');

define('ITEMS_PER_PAGE', '20');

/** NOMBRE DEL SISTEMA **/

define('PROJECT_NAME', 'Farmacias Salinasg');
define('FOOTER', 'Create by Arista Soluciones');

?>