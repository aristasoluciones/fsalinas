var AJAX_PATH = WEB_ROOT+"/ajax/checkout.php";





function Next(Id){
	
	$.ajax({
	  	type: "POST",
	  	url: AJAX_PATH,
	  	data: "type=Next&Id="+Id+'&'+$("#frm_"+Id).serialize(true)+'&rfcId='+$("#rfcId").val()+'&direccionId='+$("#direccionId").val(),
		beforeSend: function(){			
			$(".loader").html(LOADER);
			$(".txtErrMsg").hide(0);
		},		
	  	success: function(response) {		
			$(".loader").html('');
			console.log(response)
			var splitResp = response.split("[#]");
									
			if(splitResp[0] == "ok"){							
				$("#divCar").html(splitResp[1]);	
			}else if(splitResp[0] == "fail"){
				
				console.log(splitResp[1]);
				$(".txtErrMsg").show();
				$(".txtErrMsg").show();
				$(".txtErrMsg").html(splitResp[1]);				
			}else{
				alert("Ocurrio un error al cargar los datos.");
			}
		},
		error:function(){
			alert(msgError);
		}
    });

}//Next





function enviarPedido(Id){
	
	$.ajax({
	  	type: "POST",
	  	url: AJAX_PATH,
	  	data: "type=enviarPedido&Id="+Id+'&'+$("#frmGral").serialize(true),
		beforeSend: function(){			
			// $(".loader").html(LOADER);
			// $(".txtErrMsg").hide(0);
		},		
	  	success: function(response) {		
			$(".loader").html('');
			console.log(response)
			var splitResp = response.split("[#]");
									
			if(splitResp[0] == "ok"){							
				window.location.href = WEB_ROOT+"/account";
			}else if(splitResp[0] == "fail"){
				
				console.log(splitResp[1]);
				alert(splitResp[1])
			
			}else{
				alert("Ocurrio un error al cargar los datos.");
			}
		},
		error:function(){
			alert(msgError);
		}
    });

}//enviarPedido



function addDireccion(Id){
	
	$.ajax({
	  	type: "POST",
	  	url: AJAX_PATH,
	  	data: "type=addDireccion&Id="+Id+'&'+$("#frm_1").serialize(true)+'&direccionId='+$("#direccionId").val(),
		beforeSend: function(){			
			// $(".loader").html(LOADER);
			// $(".txtErrMsg").hide(0);
		},		
	  	success: function(response) {		
			$(".loader").html('');
			console.log(response)
			var splitResp = response.split("[#]");
									
			if(splitResp[0] == "ok"){							
				$("#divDirec").html(splitResp[1]);	
			}else if(splitResp[0] == "fail"){
				
				console.log(splitResp[1]);
				$(".txtErrMsg").show();
				$(".txtErrMsg").show();
				$(".txtErrMsg").html(splitResp[1]);				
			}else{
				alert("Ocurrio un error al cargar los datos.");
			}
		},
		error:function(){
			alert(msgError);
		}
    });

}//addDireccion



function addRFC(Id){
	
	$.ajax({
	  	type: "POST",
	  	url: AJAX_PATH,
	  	data: "type=addRFC&Id="+Id+'&'+$("#frm_2").serialize(true)+'&rfcId='+$("#rfcId").val(),
		beforeSend: function(){			
			// $(".loader").html(LOADER);
			// $(".txtErrMsg").hide(0);
		},		
	  	success: function(response) {		
			$(".loader").html('');
			console.log(response)
			var splitResp = response.split("[#]");
									
			if(splitResp[0] == "ok"){							
				$("#divRfc").html(splitResp[1]);	
			}else if(splitResp[0] == "fail"){
				
				console.log(splitResp[1]);
				$(".txtErrMsg").show();
				$(".txtErrMsg").show();
				$(".txtErrMsg").html(splitResp[1]);				
			}else{
				alert("Ocurrio un error al cargar los datos.");
			}
		},
		error:function(){
			alert(msgError);
		}
    });

}//addRFC

