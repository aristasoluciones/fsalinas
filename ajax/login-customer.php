<?php

	include_once('../init.php');
	include_once('../config.php');
	include_once(DOC_ROOT.'/libraries.php');

	session_start();

	switch($_POST['type']){
	
		case 'doLogin':
			
			// echo "<pre>"; print_r($_POST);
			// exit;
			$username = strip_tags($_POST['username']);
			$passwd = strip_tags($_POST['password']);
											
			$user->setUsername($username);
			$user->setPasswd($passwd);
							
			if($user->DoLogin()){
				echo "ok";
			}else{
				echo "fail[#]";					
                echo '<button class="close" data-close="alert"></button>';
		        echo "<span id='txtErrMsg'>";
				$util->ShowErrors();
				echo "</span>";				
								
			}
															
		break;
			
		
	}//switch

?>