var AJAX_PATH = WEB_ROOT+"/ajax/producto.php";


function addCar(Id){
	
	$.ajax({
	  	type: "POST",
	  	url: AJAX_PATH,
	  	data: "type=addCar&Id="+Id,		
	  	success: function(response) {		

			console.log(response)
			var splitResp = response.split("[#]");
									
			if(splitResp[0] == "ok")
				$("#divCar").html(splitResp[1]);
			else
				alert(msgFail);
		},
		error:function(){
			alert(msgError);
		}
    });
	
	// $("#frmModal").modal("show");
	
}//addCar


function deleteCar(Id){
	
	$.ajax({
	  	type: "POST",
	  	url: AJAX_PATH,
	  	data: "type=deleteCar&Id="+Id,		
	  	success: function(response) {		

			console.log(response)
			var splitResp = response.split("[#]");
									
			if(splitResp[0] == "ok")
				$("#divCar").html(splitResp[1]);
			else
				alert(msgFail);
		},
		error:function(){
			alert(msgError);
		}
    });
	
	// $("#frmModal").modal("show");
	
}//deleteCar
