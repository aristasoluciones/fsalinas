<?php
	

	$imagen->setValor($_GET["q"]);
	$infoPo = $imagen->Info();
	
	// echo "<pre>"; print_r($infoPo);

	$smarty->assign('infoPo',$infoPo);
	
?>