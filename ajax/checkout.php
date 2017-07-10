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
	
	
	
	
	case "Next":

		if($producto->NextPedido()){
			echo "ok[#]";
			
			$infoVta = $producto->infoVenta();
			$lstDir = $producto->misDirecciones();
			$lstRFC = $producto->misRFC();
			$lstM = $producto->enumerateMunicipio();
			$lstCar = $producto->detalleCarrito();
			
			foreach($lstM  as $key=>$aux){
				
				$lstM[$key]["nombre"] = utf8_encode($aux["nombre"]);
			}
			
			$smarty->assign('lstCar',$lstCar);
			$smarty->assign('lstM',$lstM);
			$smarty->assign('lstRFC',$lstRFC);
			$smarty->assign('lstDir',$lstDir);
			$smarty->assign('infoVta',$infoVta);
			$smarty->display(DOC_ROOT.'/templates/lists/checkout.tpl');
		}else{
				echo "fail[#]";					
				$util->ShowErrors();					
			}
		
	
	break;
	
	
	case "addDireccion":
		
		echo "ok[#]";
		
		$lstM = $producto->enumerateMunicipio();
		foreach($lstM  as $key=>$aux){
			
			$lstM[$key]["nombre"] = utf8_encode($aux["nombre"]);
		}
	
		$producto->setDireccionId($_POST["direccionId"]);
		$infoVta = $producto->infoDireccion();
		
// echo "<pre>"; print_r($infoVta);
		// exit;
		$smarty->assign('lstM',$lstM);
		$smarty->assign('infoVta',$infoVta);
		$smarty->display(DOC_ROOT.'/templates/lists/direccion.tpl');
		
	break;
	
	case "addRFC":
	
		
		echo "ok[#]";
		$producto->setRfcId($_POST["rfcId"]);
		$infoVta = $producto->infoRfc();

		$smarty->assign('infoVta',$infoVta);
		$smarty->display(DOC_ROOT.'/templates/lists/rfc.tpl');
	break;
	
	
	case "enviarPedido";
	
		if(count($_SESSION["carrito"])<=0){
			echo "fail[#]";
			echo "No Existen Productos en el carrito de compras";
			exit;
		}
	
		if($producto->enviarPedido()){
			echo "ok[#]";
		}else{
			echo "fail[#]";
		}
	
	break;
	
	
}//switch
	
	
	
	
	

?>