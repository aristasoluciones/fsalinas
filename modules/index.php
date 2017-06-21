<?php
	// if($Usr['isLogged']){
		// header('Location: '.WEB_ROOT);
		// exit;
	// }
	
	

	$lstSlider = $imagen->getSliderPrincipal();
	$smarty->assign('rand',rand());
	$smarty->assign('lstSlider',$lstSlider);
?>