<?php	
	//comprobar privilegios de acceso a modulo
	if($_SESSION['Usr']["role_id"]!=1)
	 $rbac->enforce('empresa',$_SESSION['Usr']["usuarioId"]);
	
	$util->PrintErrors2();
	$datosempresa = $config->DatosEmpresa();


	$smarty->assign('datosempresa',$datosempresa);

?>