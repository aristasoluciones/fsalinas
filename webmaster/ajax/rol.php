<?php
/*echo "<pre>"; print_r($_POST);
exit;*/
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();
	
	$page = 'rol';
	
	
	$smarty->assign('page',$page);
	
	// $_POST["type"]= $_GET["type"];
	switch($_POST['type']){
	
		case 'add':
								
				echo 'ok[#]';	
				$smarty->assign('titleFrm','Agregar Rol');				
				$smarty->display(DOC_ROOT.'/templates/boxes/add_catalogo.tpl');
																
			break;
		
		case 'edit':
				
				$objRole->setId($_POST['id']);
				$info = $objRole->Info();
				// $info = $util->EncodeRow($info);	
				echo 'ok[#]';
				$smarty->assign('titleFrm','Editar Rol');
				$smarty->assign('info',$info);				
				$smarty->display(DOC_ROOT.'/templates/boxes/add_catalogo.tpl');
																
			break;
		case 'save':
				if($util->ValidateRequireField($_POST["descripcion"],"Descripcion"))
		       	{
					$util->ValidateString($value, 100, 0, '');
		      	}
		      	if($util->ValidateRequireField($_POST["nombre"],"Nombre corto"))
		       	{
					$util->ValidateString($value, 100, 0, '');
		      	}
		      	if($util->PrintErrors()){ 
		      		echo "fail[#]";					
					$util->ShowErrors();	
				}
				else
				{

                   $perm_id = $rbac->Roles->add($_POST['nombre'],$_POST['descripcion']);
                   if($perm_id){
                   	 $util->setError(10129, 'complete', '');
		             $util->PrintErrors();
                   	 echo 'ok[#]';
                    }
                    else{
                    	echo 'fail[#]';
                    }
					
				}
				
				
				
			break;
		case 'update':
		        /*echo "<pre"*/
		        if($util->ValidateRequireField($_POST["descripcion"],"Descripcion"))
		       	{
					$util->ValidateString($value, 100, 0, '');
		      	}
		      	if($util->ValidateRequireField($_POST["nombre"],"Nombre corto"))
		       	{
					$util->ValidateString($value, 100, 0, '');
		      	}
		      	if($util->PrintErrors()){ 
		      		echo "fail[#]";					
					$util->ShowErrors();	
				}
				else
				{
                   $perm_id = $rbac->Roles->edit($_POST["id"],$_POST['nombre'],$_POST['descripcion']);
                   if($perm_id){
                   	 $util->setError(10129, 'complete', '');
		             $util->PrintErrors();
                   	 echo 'ok[#]';
                    }
                    else{
                    	echo 'fail[#]';
                    }
					
				}
				
				
				
			break;
			
		case 'saveConfig':
		/*echo "<pre>";
		print_r($_POST);exit;*/
               $arrayReq = array();
                if(!empty($_POST['permisos_assign']))
                  $arrayReq = $_POST['permisos_assign']; 
               	
               	//desasignar los permisos relacionados al rol para agregar los nuevos
               	//esto limpia los permisos que estan agregados al rol.
               	$rbac->Roles->unassignPermissions($_POST["role_id"]);

               	foreach($arrayReq as $key=>$value)
                {
                  if(!$rbac->assign($_POST["role_id"],$value))
                  {
                     echo "fail[#]";  
                     exit;
                  }
                }
              echo "ok[#]";
                
		break;

		case 'delete':
				
				$objRole->setId($_POST['id']);
				
				if($objRole->Delete()){					
					echo 'ok[#]';				
				}
				
	    break;
		
		case 'loadPage':
		
				$cat_tramite->setPage($_POST['p']);								
				$registros = $cat_tramite->Enumerate();
				$util->PrintErrors2();
				echo 'ok[#]';			
				$smarty->assign('registros',$registros);
				$smarty->display(DOC_ROOT.'/templates/lists/'.$page.'.tpl');
				
		break;
		
}//switch

?>