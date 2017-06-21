<?php
/*echo "<pre>"; print_r($_POST);
exit;*/
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();
	
	$page = 'pedido';
	
	
	$smarty->assign('page',$page);
	
	// $_POST["type"]= $_GET["type"];
	switch($_POST['type']){


		case 'loadPage':
			    $pedido->setPage($_POST['p']);
			    $registros = $pedido->Enumerate();
				echo 'ok[#]';
				$usr = $_SESSION['Usr'];
			    //obtener todos los permisos del rol del usuario activo
			    $permisos_general = $rbac->Roles->permissions($usr["role_id"],false);
			    //convertir conjunto de permisos en un array de 1D para obtener solo la columna Title
			    $permisos_titles =  $config->getOnlyColumnArray($permisos_general,"Title");
			    //asignar a una variable smarty el array de permisos para utilizarlo y mostrar ciertos accesos al menu
			    $smarty->assign('privilegios',$permisos_titles);
			    $smarty->assign('usr',$usr);			
				$smarty->assign('registros',$registros);
				$smarty->display(DOC_ROOT.'/templates/lists/'.$page.'.tpl');
				
		break;
		case 'detalle':
			   $pedido->setId($_POST['id']);
			   $detalles =  $pedido->DetallePedido();

			   $smarty->assign('detalles',$detalles);
			   $smarty->display(DOC_ROOT.'/templates/lists/detalle-pedido.tpl');


		break;
		case 'remove':
				
				$pedido->setId($_POST['id']);
				if($pedido->Delete()){					
					echo 'ok[#]';				
				}else
				{
					echo 'fail[#]';
				}
				
	    break;
	    case 'activar':
				$pedido->setId($_POST['id']);
				if($pedido->Activar()){					
					echo 'ok[#]';				
				}else
				{
					echo 'fail[#]';
				}
				
	    break;

				
}//switch

?>