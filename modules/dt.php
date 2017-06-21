<?php
	

	$imagen->setValor($_GET["q"]);
	$infoPo = $imagen->Info();
	
	// echo "<pre>"; print_r($infoPo);
	
	$lstCar = $producto->detalleCarrito();

	$smarty->assign('lstCar',$lstCar);
	$smarty->assign('infoPo',$infoPo);
	
?>