<?php
// echo "<pre>"; print_r($_POST);
// exit;
include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/libraries.php');

session_start();

$page = 'usuario';

$smarty->assign('titleFrm','Usuario');
$smarty->assign('page',$page);

switch($_POST['type']){
	
	
	
	
	case "deleteCar":
	
		foreach($_SESSION["carrito"] as $key=>$aux)
		{
			if($key==$_POST["Id"])
			unset($_SESSION["carrito"][$key]);
		}
		
		$lstCar = $producto->detalleCarrito();
		echo "ok[#]";
		$smarty->assign('lstCar',$lstCar);
		$smarty->display(DOC_ROOT.'/templates/lists/car.tpl');
	
	break;
	
	
	case "updateCar":
	
	// echo "<pre>"; print_r($_POST);
	$producto->updateCarrito();
	$lstCar = $producto->detalleCarrito();
		echo "ok[#]";
		$smarty->assign('lstCar',$lstCar);
		$smarty->display(DOC_ROOT.'/templates/lists/car.tpl');
	
	break;
		
	
}//switch
	
	
	
	
	

?>