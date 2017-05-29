<?php
	

	$imagen->setValor($_GET["q"]);
	$InfoCategoria = $imagen->InfoCategoria();
	
	// echo "<pre>"; print_r($InfoCategoria );
	// exit;
	$lstCar = $producto->detalleCarrito();

	$smarty->assign('q',$_GET["q"]);
	$smarty->assign('lstCar',$lstCar);
	$smarty->assign('InfoCategoria',$InfoCategoria);
	
?>