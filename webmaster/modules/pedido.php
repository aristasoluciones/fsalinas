<?php	
	//comprobar privilegios de acceso a modulo
	if($_SESSION['Usr']["role_id"]!=1)
	 $rbac->enforce('pedido',$_SESSION['Usr']["usuarioId"]);
	
	//$cat_tramite->setAll('no');
	$util->PrintErrors2();
	$pedidos = $pedido->Enumerate();

	/*echo "<pre>";
	print_r($pedidos);
	exit;*/
	if(!empty($pedidos))
		$smarty->assign('datatable_flag',true);
	
	$smarty->assign('registros',$pedidos);

?>