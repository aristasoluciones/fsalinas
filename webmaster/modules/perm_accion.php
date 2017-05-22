<?php	
    //comprobar privilegios de acceso a modulo
    if($_SESSION['Usr']["role_id"]!=1)
    	$rbac->enforce('perm_accion',$_SESSION['Usr']["usuarioId"]);


    
	$util->PrintErrors2();
    $permisos = $config->getListPermisos();
    if(!empty($permisos))
		$smarty->assign('datatable_flag',true);
    
	$smarty->assign('registros',$permisos);
	
?>