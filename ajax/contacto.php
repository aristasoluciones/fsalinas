<?php
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$page = 'documento';

$smarty->assign('titleFrm','Documento');
$smarty->assign('page',$page);

switch($_POST['type']){

	case 'enviarCorreo':
			
			
			if($imagen->EnviaComentario()){
				echo "ok[#]";
				echo "El Mensaje se envio correctamente, en breve nos pondremos en contacto con Usted";
			}else{
				echo "fail[#]";
			}
			
															
		break;
		
	
	
}//switch

?>