<?php
// echo "<pre>"; print_r($_POST);
// exit;
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$page = 'usuario';

$smarty->assign('titleFrm','Usuario');
$smarty->assign('page',$page);

switch($_POST['type']){
	
	
	
	
	case "Next":

		if($producto->NextPedido()){
			echo "ok[#]";
			$infoVta = $producto->infoVenta();
			$smarty->assign('infoVta',$infoVta);
			$smarty->display(DOC_ROOT.'/templates/lists/checkout.tpl');
		}else{
				echo "fail[#]";					
				$util->ShowErrors();					
			}
		
	
	break;
	
	
}//switch
	
	
	
	
	

?>