<?php	
	//comprobar privilegios de acceso a modulo
	if($_SESSION['Usr']["role_id"]!=1)
		$rbac->enforce('cat_electronico',$_SESSION['Usr']["usuarioId"]);	
	
    $util->PrintErrors2();
	

	/*if(!empty($sucursales))
		$smarty->assign('datatable_flag',true);*/
  /* $smarty->assign('info',$info);*/
	
?>