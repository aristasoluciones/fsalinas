<?php
// echo "<pre>"; print_r($_POST);
// exit;
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();
	
	$page = 'producto';
	
	
	$smarty->assign('page',$page);
	
	// $_POST["type"]= $_GET["type"];
	switch($_POST['type']){
	
		case 'add':
								
				echo 'ok[#]';	
				$smarty->assign('titleFrm','Agregar Categoria');				
				$smarty->display(DOC_ROOT.'/templates/boxes/add_catalogo.tpl');
																
		break;
		case 'add_pcat':
		        $producto->setId($_POST['id']);
				$info2 =  $producto->Info();
				echo 'ok[#]';
				$page = 'producto_cat';	
				$smarty->assign('page',$page);
				$smarty->assign('info2',$info2);
				$smarty->assign('titleFrm','Agregar producto a categoria');				
				$smarty->display(DOC_ROOT.'/templates/boxes/add_catalogo.tpl');
																
		break;
		
		case 'edit_pcat':
				
				$producto->setId($_POST['id']);
				$info = $producto->Info2();
				$page = 'producto_cat';	
				// $info = $util->EncodeRow($info);	
				echo 'ok[#]';
				$smarty->assign('page',$page);
				$smarty->assign('titleFrm','Editar Producto');
				$smarty->assign('info',$info);				
				$smarty->display(DOC_ROOT.'/templates/boxes/add_catalogo.tpl');
																
			break;
		case 'edit':
				
				$producto->setId($_POST['id']);
				$info = $producto->Info();
				// $info = $util->EncodeRow($info);	
				echo 'ok[#]';
				$smarty->assign('titleFrm','Editar Producto / Articulo');
				$smarty->assign('info',$info);				
				$smarty->display(DOC_ROOT.'/templates/boxes/add_catalogo.tpl');
																
		break;
		case 'save':

				$producto->setNombre($_POST['nombre']);
				$producto->setDescripcion($_POST['descripcion']);
				$producto->setAquien($_POST['aquien']);
				$producto->setVentaja($_POST['ventaja']);
				//se comprueba si se subio alguna imagen
				if(is_uploaded_file($_FILES["imgCategoria"]["tmp_name"]))
				{
                   /* comprobar si el archivo esta permitido y no exceda el limite maximo en kb*/
				  if (in_array($_FILES['imgCategoria']['type'], ARCHIVOS_PERMITIDOS) && $_FILES['img']['size'] <= LIMITE_KB * 1024){
     	  	          # obtenermos la anchura y altura de la imagen
        			  $infoImg=getimagesize($_FILES["imgCategoria"]["tmp_name"]);
                        //echo "<BR>".$info[0]; //anchura
				        //echo "<BR>".$info[1]; //altura
				        //echo "<BR>".$info[2]; //1-GIF, 2-JPG, 3-PNG
				        //echo "<BR>".$info[3]; //cadena de texto para el tag <img
				        //
				  	  $imagen_temporal = $_FILES['imgCategoria']['tmp_name'];
				  	  $tipo = $_FILES['imgCategoria']['type'];
				  	  $data=file_get_contents($imagen_temporal);

				  	  //escapamos los caracteres especiales
				  	  $util->DB()->setDataString($data);
				  	  $data_escape = $util->DB()->EscapeString();
				  	  //guardamos en la base de datos toda la informacion
                      $producto->setAchura($infoImg[0]);
                      $producto->setAltura($infoImg[1]);
                      $producto->setTipo($tipo);
                      $producto->setDataBloob($data_escape);
    				}
				}
				$success = $producto->Save();
				if($success){									
					echo 'ok[#]';
                   					
				}else{
					echo "fail[#]";					
					$util->ShowErrors(s);					
				}
				
			break;
		case 'update':

		        $producto->setId($_POST['id']);
				$producto->setNombre($_POST['nombre']);
				$producto->setDescripcion($_POST['descripcion']);
				$producto->setAquien($_POST['aquien']);
				$producto->setVentaja($_POST['ventaja']);
				//se comprueba si se subio alguna imagen
				if(is_uploaded_file($_FILES["imgCategoria"]["tmp_name"]))
				{ 
                   /* comprobar si el archivo esta permitido y no exceda el limite maximo en kb*/
				  if (in_array($_FILES['imgCategoria']['type'], $archivos_permitidos) && $_FILES['imgCategoria']['size'] <= $limite_kb * 1024){

     	  	          # obtenermos la anchura y altura de la imagen
        			  $infoImg=getimagesize($_FILES["imgCategoria"]["tmp_name"]);
                        //echo "<BR>".$info[0]; //anchura
				        //echo "<BR>".$info[1]; //altura
				        //echo "<BR>".$info[2]; //1-GIF, 2-JPG, 3-PNG
				        //echo "<BR>".$info[3]; //cadena de texto para el tag <img
				        //
				       $data="";
				  	  $imagen_temporal = $_FILES['imgCategoria']['tmp_name'];
				  	  $tipo = $_FILES['imgCategoria']['type'];
				  	  $data=file_get_contents($imagen_temporal);

				  	  //escapamos los caracteres especiales
				  	  $util->DB()->setDataString($data);
				  	  $data_escape = $util->DB()->EscapeString();
				  	  //guardamos en la base de datos toda la informacion
                      $producto->setAchura($infoImg[0]);
                      $producto->setAltura($infoImg[1]);
                      $producto->setTipo($tipo);
                      $producto->setDataBloob($data_escape);
    				}
				}
				$success = $producto->Update();
				
				if($success){									
					echo 'ok[#]';
                   						
				}else{
					echo "fail[#]";					
					$util->ShowErrors();					
				}
				
			break;
	
	
		case 'remove':
				
				$producto->setId($_POST['id']);
				if($producto->Delete()){					
					echo 'ok[#]';				
				}else
				{
					echo 'fail[#]';
				}
				
	    break;
	    case 'activar':
				$producto->setId($_POST['id']);
				if($producto->Activar()){					
					echo 'ok[#]';				
				}else
				{
					echo 'fail[#]';
				}
				
	    break;
		case 'removeCat':
				
				$producto->setId($_POST['id']);
				if($producto->DeleteCategoria()){					
					echo 'ok[#]';				
				}else
				{
					echo 'fail[#]';
				}
				
	    break;
		case 'save_pcat':
                $prefix ="img_pro_cat_".$_POST["categoria_id"];
	            $urldestino=DOC_ROOT_IMG."/productos_categorias/";
	            $urlwebroot=WEB_ROOT_IMG."/productos_categorias/";


	            $producto->setId($_POST['categoria_id']);
				$producto->setNombre($_POST['nombre']);
				$producto->setDescripcion($_POST['descripcion']);
				$producto->setFile($_FILES["img_pcat"]);
				$producto->setUrl($urlwebroot);

				//obtener la ultima fila insertada en la tabla productos_categorias
				$last_id = $producto->getLastIdPcat();
                $concatname = $last_id+1;
                $producto->setNarchivo( $_FILES["img_pcat"]["tmp_name"]);

                //se guarda producto para la categoria
				$success = $producto->SavePcat();
				if($success){	
				 $archivo_temp =  $_FILES["img_pcat"]["tmp_name"];
                 $extension =  explode(".",$_FILES["img_pcat"]["name"]);
                 $ext = end($extension);
                 $targetPath =  $urldestino.$prefix.$concatname.".".$ext;
	                 if(move_uploaded_file($archivo_temp,$targetPath))
	                 {
	                   //actualizar extension del archivo y nombre
	                   $producto->setId($concatname);
	                   $producto->setNarchivo($prefix.$concatname);
	                   $producto->setExtension($ext);
	                   $producto->UpdateData();
	                   
	                   echo 'ok[#]';	
	                 }
	                 else
	                 {
	                 	//si hubo error al mover archivo eliminar en la base de datos
	                 	$producto->setId($concatname);
	                 	$producto->RollBackData();
	                 	echo "fail[#]";	
	                 	$util->setError(10136, 'error', '');
	                 	$util->PrintErrors();			
						$util->ShowErrors();
	                 }
				 
                   					
				}else{
					echo "fail[#]";					
					$util->ShowErrors();					
				}
			break;
		case 'update_pcat':
                $prefix ="img_pro_cat_".$_POST["categoria_id"];
	            $urldestino=DOC_ROOT_IMG."/productos_categorias/";
	            $urlwebroot=WEB_ROOT_IMG."/productos_categorias/";

	            $producto->setId($_POST['categoria_id']);
				$producto->setNombre($_POST['nombre']);
				$producto->setDescripcion($_POST['descripcion']);
				$producto->setFile($_FILES["img_pcat"]);
				$producto->setUrl($urlwebroot);

				//obtener la ultima fila insertada en la tabla productos_categorias
			    $concatname = $_POST['pcat_id'];
                $producto->setNarchivo( $_FILES["img_pcat"]["tmp_name"]);
                $producto->setPcatId($concatname);
                //se Atualiza datos del producto para la categoria
				$success = $producto->UpdatePcat();
				if($success){	
				 $archivo_temp =  $_FILES["img_pcat"]["tmp_name"];
                 $extension =  explode(".",$_FILES["img_pcat"]["name"]);
                 $ext = end($extension);
                 $targetPath =  $urldestino.$prefix.$concatname.".".$ext;
	                 if(move_uploaded_file($archivo_temp,$targetPath))
	                 {
	                   //actualizar extension del archivo y nombre del registro
	                   $producto->setId($concatname);
	                   $producto->setNarchivo($prefix.$concatname);
	                   $producto->setExtension($ext);
	                   $producto->UpdateData();
	                   
	                   echo 'ok[#]';	
	                 }
	                 else
	                 {
	                 	//si hubo error al mover archivo eliminar en la base de datos
	                 	$producto->setId($concatname);
	                 	$producto->RollBackData();
	                 	echo "fail[#]";	
	                 	$util->setError(10136, 'error', '');
	                 	$util->PrintErrors();			
						$util->ShowErrors();
	                 }
				 
                   					
				}else{
					echo "fail[#]";					
					$util->ShowErrors();					
				}
			break;
		
}//switch

?>