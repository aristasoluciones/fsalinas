<?php	
	//comprobar privilegios de acceso a modulo
	// if($_SESSION['Usr']["role_id"]!=1)
	 // $rbac->enforce('pedido',$_SESSION['Usr']["usuarioId"]);
 
	$objRole->setRoleId($_SESSION['Usr']["role_id"]);
	$lisPermisos = $objRole->permisoSegunRol();

	if($_SESSION['Usr']["role_id"] <> 1){
		 if(!in_array(13,$lisPermisos)){
			echo "<font color='red'>El usuario no tiene permisos para ingresar a esta seccion</font>";
			exit;
		 }
	}
	
	//$cat_tramite->setAll('no');
	$util->PrintErrors2();

	$usuario->setId($_SESSION['Usr']["usuarioId"]);
	$infoU = $usuario->Info();
	
	
	$pedido->setSucursalId($infoU["sucursalId"]);
	$pedidos = $pedido->Enumerate();

	/*echo "<pre>";
	print_r($pedidos);
	exit;*/
	if(!empty($pedidos))
		$smarty->assign('datatable_flag',true);
	
	$smarty->assign('registros',$pedidos);

?>