<?php
	
	/* For Session Control - Don't remove this */
	$user->AllowAccess();	
	/* End Session Control */
	// $producto->setValor($_GET["q"]);
	$infoVta = $producto->infoVenta(); 	

	$lstDir = $producto->misDirecciones();
	// exit;
	$lstRFC = $producto->misRFC();
	
	$lstCar = $producto->detalleCarrito();

	
	
	// echo "<pre>"; print_r($lstRFC );
	// exit;

	$smarty->assign('lstRFC',$lstRFC);
	$smarty->assign('lstDir',$lstDir);
	$smarty->assign('infoVta',$infoVta);
	$smarty->assign('lstCar',$lstCar);

	
?>