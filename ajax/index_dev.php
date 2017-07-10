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
	
	case "edit":
		
		echo "ok[#]";
		
		$idReg = $_POST['id'];
								
		$imagen->setId($_POST["Id"]);
		$info = $imagen->InfoImg($idReg);
			
		$smarty->assign('info',$info);
		$smarty->assign('Id',$_POST["Id"]);
		$smarty->display(DOC_ROOT.'/templates/forms/edit_img_dev.tpl');

		
	break;
	
	
	case "upFile":
	
		$imagen->setId($_POST["id"]);
		if($imagen->upFile()){
			echo "ok[#]";
		}else{
			echo "fail[#]";
		}
		
	
	break;
	
}//switch
	
	
	
	
	

?>