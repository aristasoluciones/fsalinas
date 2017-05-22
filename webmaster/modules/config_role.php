<?php	
     if($_SESSION['Usr']["role_id"]!=1)
    	$rbac->enforce('config_role',$_SESSION['Usr']["usuarioId"]);
	//$cat_tramite->setAll('no')
	$rol_id =  $_GET['id'];
    $objRole->setId($rol_id);
	$row_rol = $objRole->Info();

	$permisos = $config->getListPermisos();
	$role_permisos =  $objRole->getPermisosRoles($permisos['result'],$rol_id);
	 
	$smarty->assign('row',$row_rol);
	$smarty->assign('listReq',$role_permisos);
	
?>