<?php	
	//comprobar privilegios de acceso a modulo
	if($_SESSION['Usr']["role_id"]!=1)
	 $rbac->enforce('detalle-pedido',$_SESSION['Usr']["usuarioId"]);
	
	//$cat_tramite->setAll('no')
	$pedido->setId($_GET['id']);
	$detallespedidos = $pedido->DetallePedido();

	/*echo "<pre>";
	print_r($pedidos);
	exit;*/

	
	$smarty->assign('detallespedido',$detallespedidos);

?>