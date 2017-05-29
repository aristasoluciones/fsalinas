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
	
	case "addCar":
		
		// unset($_SESSION["carrito"]);

		if(!is_array($_SESSION["carrito"]))
		$_SESSION["carrito"]=array();
	
		foreach($_SESSION["carrito"] as $key=>$aux){
			
			if($aux["Id"]== $_POST["Id"]){
				echo "fail[#]";
				echo "El Producto ya existe dentro del carrito de compras";
				exit;
			}
			
		}
		
		end($_SESSION["carrito"]);
		$key1 = key($_SESSION["carrito"]) + 1;
		$_SESSION["carrito"][$key1]["Id"] =  $_POST["Id"];
		$_SESSION["carrito"][$key1]["cantidad"] = 1;
	
		$lstCar = $producto->detalleCarrito();
		echo "ok[#]";
		$smarty->assign('lstCar',$lstCar);
		$smarty->display(DOC_ROOT.'/templates/carrito.tpl');

		
	break;
	
	
	case "deleteCar":
	
		foreach($_SESSION["carrito"] as $key=>$aux)
		{
			if($key==$_POST["Id"])
			unset($_SESSION["carrito"][$key]);
		}
		
		$lstCar = $producto->detalleCarrito();
		echo "ok[#]";
		$smarty->assign('lstCar',$lstCar);
		$smarty->display(DOC_ROOT.'/templates/carrito.tpl');
	
	break;
		
		
	case "buscar":
	
		echo "ok[#]";

		
			// echo "<pre>"; print_r($_POST);
			// exit;
		$imagen->setValor($_POST["q"]);
		$imagen->setNombre($_POST["producto"]);
		$imagen->setOrder($_POST["order"]);
		$InfoCategoria = $imagen->InfoCategoria();
		$smarty->assign('InfoCategoria',$InfoCategoria);
		$smarty->display(DOC_ROOT.'/templates/lst-producto.tpl');
		
	break;
	
}//switch
	
	
	
	
	

?>