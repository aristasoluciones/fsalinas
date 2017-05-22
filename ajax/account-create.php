<?php
// echo "<pre>"; print_r($_POST);	
// exit;
	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();
	
	$page = 'documento';
	
	$smarty->assign('titleFrm','Documento');
	$smarty->assign('page',$page);
	
	switch($_POST['type']){
	
		case 'enviarDatos':
								
			
			$idReg = $_POST['id'];
								
			$clientes->setId($idReg);
		
			$clientes->setNombre($_POST['nombre']);
			$clientes->setApaterno($_POST['apellidop']);
			$clientes->setAmaterno($_POST['apellidom']);
			$clientes->setEmail($_POST['email'],true);
			$clientes->setPasswd($_POST['pass']);
			$clientes->setActivo('no');

			
			
			
			$id = $clientes->Save();
			
			
			
			if($id){
				echo "ok[#]";
				$clientes->setId($id);
				$infoU = $clientes->Info();
				
				// echo "<pre>"; print_r($infoU);				
				// exit;
				$e = explode("@",$infoU["email"]);
				$smarty->assign('url',$e[1]);
				$smarty->assign('infoU',$infoU);
				$smarty->display(DOC_ROOT.'/templates/boxes/confirma-registro.tpl');
				
				
				$ikey->setCampo($infoU["clienteId"]);
				$IdCifrado =  $ikey->Cifrar();
				
				// echo $IdCifrado;
				// exit;
				
				$dataMail ["subject"] = "Bienvenido a Farmacias Salinas G";
				$dataMail ["mensaje"] = utf8_decode ("
				<html>
					<head>
						<style type='text/css'> 
						.txtTicket{
									font-size:18px;
									 font-family: sans-serif;
									/*text-transform: uppercase;
									font:bold 12px 'Trebuchet MS';*/ 
								}
								table,td {
								border: 1px solid gray;
								border-collapse: collapse;
								
							}
							.principal
							{
								background-color: #007dbc;
								text-align: center!important;
								padding: 11px 13px 13px;
								margin-right: 10px;
								height: 12px;
								width: 12px;
								font-size:20px;
									color: #fff;
								-webkit-border-radius: 50%!important;
								-moz-border-radius: 50%!important;
							}
							.Boton
							{
								background-color: #22C84C;
								text-align: center!important;
								padding: 11px 13px 13px;
								margin-right: 10px;
								height: 50px;
								width: 300px;
								font-size:20px;
								font-color: #fff;
								-webkit-border-radius: 1%!important;
								-moz-border-radius: 1%!important;
							}


							</style>

					</head>
					<body BGCOLOR='#ECF3F7'>
						<br>
						<br>
						<br>
						<br>
						<center>
							<table style='width:500px; background:white; margin-left: 21px; margin-right: 5px' class='txtTicket'>
							<tr>
								<td>
								
									<br>
									<br>
									<br>
									<br>
									<br>
								</td>
							</tr>
							<tr>
								<td style='text-align : justify; padding: 55px;'>

									<b>Estimado, ".$infoU["nombre"]."</b>
									<br>
									<br>
									<br>
									Gracias por crear una cuenta dentro de Farmacias Salinas G,  
									antes de iniciar sesión favor de verificar tu cuenta a través de los siguientes pasos.
									<br>  
									<br>  
									<br>  
									<div class='principal'>1</div> Haz clic en el Botón Verificar o copia y pega en tu navegador el siguiente enlace. 
									<a href='".WEB_ROOT."/ayj/yek/".$IdCifrado."' >".WEB_ROOT."/ayj/yek/".$IdCifrado."</a>
									<br>
									<br>
									<div class='principal'>2</div> El Enlace o Botón  redirecciona a la pagina de verificación, donde debes presionar el Boton Activar
									<br>
									<br>
									<div class='principal'>3</div> Ingresa a la pagina principal de Farmacias Salinas G e ingresa los datos correspondientes a tu cuenta que encontraras a continuación.
									<br>
									<br>
									<center>
										<div class='Boton'>
										<a href='".WEB_ROOT."/ayj/yek/".$IdCifrado."' style='color:white;text-decoration:none; ' >Verificar</a>
										</div>
									</center>
								</td>
							</tr>
							<tr>
								<tr>
									<td>
										<br>
										<br>
										<b>Datos del Usuario</b>
										<br>
										<br>
										<table>
											<tr>
												<td><b>Usuario:</b></td>
												<td>".$infoU["email"]."</td>
											</tr>
											<tr>
												<td><b>Contraseña:</b></td>
												<td>********* Oculta por Seguridad</td>
											</tr>
										</table>
									</td>
								</tr>
							</tr>
							</table>
							
						</center>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
					</body>
				</html>
				");
				
				$dataMail ["from"] = "contacto@farmaciassalinasg.com";
				$dataMail ["fromUsr"] = "Farmacias Salinas G";
				$dataMail ["Address"] = $infoU["email"];
				$dataMail ["AddressUsr"] = $infoU["nombre"];
				
				$util->EnviaCorreo($dataMail);
				
			}else{
				echo "fail[#]";					
				$util->ShowErrors();					
			}
																
		break;
		
		
		case "valida":
		
			

			$success = $clientes->setCadena($_POST["email"]);
			$success = $clientes->setTipoVal($_POST["tipo"]);
			$success = $clientes->Valida();

			if($success){									
				echo 'ok[#]';
			}else{
				echo "fail[#]";					
				$util->ShowErrors();					
			}
		break;
		
		
		case "ActivaCuenta":
		
			
			$clientes->setLLaveMd5($_POST["key"]);
			$success = $clientes->ActivaCuenta();

			if($success){									
				echo 'ok[#]';
			}else{
				echo "fail[#]";					
				$util->ShowErrors();					
			}
			
		break;
		
		
		
	}//switch

?>