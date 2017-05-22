<?php
// echo "<pre>"; print_r($_POST);
// exit;
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();
	
	$page = 'sucursal';
	
	
	$smarty->assign('page',$page);
	
	// $_POST["type"]= $_GET["type"];
	switch($_POST['type']){
	
		case 'add':
								
				echo 'ok[#]';	
				$smarty->assign('titleFrm','Agregar sucursal');				
				$smarty->display(DOC_ROOT.'/templates/boxes/add_catalogo.tpl');
																
			break;
		
		case 'edit':
				
				$sucursal->setId($_POST['id']);
				$info = $sucursal->Info();
				// $info = $util->EncodeRow($info);	
				echo 'ok[#]';
				$smarty->assign('titleFrm','Editar Sucursal');
				$smarty->assign('info',$info);				
				$smarty->display(DOC_ROOT.'/templates/boxes/add_catalogo.tpl');
																
			break;
		case 'save':
				$sucursal->setNombre($_POST['nombre']);
				$sucursal->setEncargado($_POST['encargado']);
				$sucursal->setDireccion($_POST['direccion']);
				$sucursal->setDescripcion($_POST['descripcion']);
				//$sucursal->setClave($_POST['clave_tramite']);
				$success = $sucursal->Save();
				
				if($success){									
					echo 'ok[#]';     					
				}else{
					echo "fail[#]";					
					$util->ShowErrors();					
				}
				
			break;
		case 'update':
		        $sucursal->setId($_POST['id']);
				$sucursal->setNombre($_POST['nombre']);
				$sucursal->setEncargado($_POST['encargado']);
				$sucursal->setDireccion($_POST['direccion']);
				$sucursal->setDescripcion($_POST['descripcion']);
				$success = $sucursal->Update();
				if($success){									
					echo 'ok[#]';									
				}else{
					echo "fail[#]";					
					$util->ShowErrors();					
				}
				
			break;
								
		case 'delete':
				
				$dependencia->setId($_POST['id']);
				
				if($dependencia->Delete()){					
					echo 'ok[#]';				
				}
				
			break;
		
		case 'loadPage':
		
				$sucursal->setPage($_POST['p']);								
				$registros = $sucursal->Enumerate();
				$util->PrintErrors2();
				echo 'ok[#]';			
				$smarty->assign('registros',$registros);
				$smarty->display(DOC_ROOT.'/templates/lists/'.$page.'.tpl');
				
			break;
			
	break;
}//switch

?>