<?php
	

	// $producto->setValor($_GET["q"]);
	$infoVta = $producto->infoVenta();
	
	// echo "<pre>"; print_r($infoVta );
	// exit;
	
	$lstCar = $producto->detalleCarrito();
	$smarty->assign('infoVta',$infoVta);
	$smarty->assign('lstCar',$lstCar);

	
?>