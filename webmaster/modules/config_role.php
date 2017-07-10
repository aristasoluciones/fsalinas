<?php	
    // if($_SESSION['Usr']["role_id"]!=1)
    // $rbac->enforce('config_role',$_SESSION['Usr']["usuarioId"]);
	// echo "<pre>"; print_r($permisos);
	// exit;
	// $permisos = $config->getListPermisos();
	// $role_permisos =  $objRole->getPermisosRoles($permisos['result'],$rol_id);
	//$cat_tramite->setAll('no')
	
	$objRole->setRoleId($_SESSION['Usr']["role_id"]);
	$lisPermisos = $objRole->permisoSegunRol();

	if($_SESSION['Usr']["role_id"] <> 1){
		 if(!in_array(6,$lisPermisos)){
			echo "<font color='red'>El usuario no tiene permisos para ingresar a esta seccion</font>";
			exit;
		 }
	}
	
	$rol_id =  $_GET['id'];
    $objRole->setId($rol_id);
	$row_rol = $objRole->Info();
	
    $objRole->setId($rol_id);
	$permisos = $objRole->configurarRoles();

	// echo "<pre>"; print_r($permisos);
	// exit;
	$smarty->assign('row',$row_rol);
	$smarty->assign('listReq',$permisos);
	
?>