<?php	
	
	//comprobar privilegios de acceso a modulo
	if($_SESSION['Usr']["role_id"]!=1)
		$rbac->enforce('blog',$_SESSION['Usr']["usuarioId"]);	
	
    $util->PrintErrors2();
	$info = $config->GetNotaActual();

	/*if(!empty($sucursales))
		$smarty->assign('datatable_flag',true);*/
	
	$smarty->assign('info',$info);
	
?>