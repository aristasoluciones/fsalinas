<?php	
	
	//comprobar privilegios de acceso a modulo
	if($_SESSION['Usr']["role_id"]!=1)
	$rbac->enforce('cliente',$_SESSION['Usr']["usuarioId"]);	
	
	$util->PrintErrors2();
	$clientes = $cliente->Enumerate();

	if(!empty($clientes))
		$smarty->assign('datatable_flag',true);

	$smarty->assign('registros',$clientes);
	
?>