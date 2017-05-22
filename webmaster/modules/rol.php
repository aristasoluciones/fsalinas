<?php	
	
	if($_SESSION['Usr']["role_id"]!=1)
    	$rbac->enforce('rol',$_SESSION['Usr']["usuarioId"]);
    
	$util->PrintErrors2();
	$roles = $objRole->Enumerate();
	if(!empty($roles))
		$smarty->assign('datatable_flag',true);
	
	$smarty->assign('registros',$roles);
	
?>