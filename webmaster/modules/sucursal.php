<?php	
	
	//comprobar privilegios de acceso a modulo
	if($_SESSION['Usr']["role_id"]!=1)
	$rbac->enforce('sucursal',$_SESSION['Usr']["usuarioId"]);	
	
	$util->PrintErrors2();
	$sucursales = $sucursal->EnumerateAll();
	$smarty->assign('registros',$sucursales);
	
?>