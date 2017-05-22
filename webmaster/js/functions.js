var urlLoc = document.location.hostname;
console.log(urlLoc);
if(urlLoc == "localhost")
	var WEB_ROOT = "http://" + urlLoc + "/fsalinas/webmaster";
else if(urlLoc == "desarrollot.no-ip.biz" || urlLoc == "192.168.1.200")
	var WEB_ROOT = "http://" + urlLoc + "/fsalinas/webmaster";
else
	var WEB_ROOT = "http://" + urlLoc + "/webmaster";

var LOADER = "<img src='"+WEB_ROOT+"/images/loading.gif'><br>Cargando...";
var LOADER2 = "<img src='"+WEB_ROOT+"/images/loader.gif'>";
var LOADER3 = "<div align='center'><img src='"+WEB_ROOT+"/images/loading.gif'><br>Cargando...</div>";

var msgFail = "Ocurrio un error al cargar los datos.";
var msgError = "Something went wrong...";
/*
jQuery(function($){
  $.datepicker.regional['es'] = {
                renderer: $.ui.datepicker.defaultRenderer,
                monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
                'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
                'Jul','Ago','Sep','Oct','Nov','Dic'],
                dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
                dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
                //dateFormat: 'dd/mm/yyyy',
				dateFormat: 'yy-mm-dd',
                firstDay: 1,
                prevText: '&#x3c;Ant', prevStatus: '',
                prevJumpText: '&#x3c;&#x3c;', prevJumpStatus: '',
                nextText: 'Sig&#x3e;', nextStatus: '',
                nextJumpText: '&#x3e;&#x3e;', nextJumpStatus: '',
                currentText: 'Hoy', currentStatus: '',
                todayText: 'Hoy', todayStatus: '',
                clearText: '-', clearStatus: '',
                closeText: 'Cerrar', closeStatus: '',
                yearStatus: '', monthStatus: '',
                weekText: 'Sm', weekStatus: '',
                dayStatus: 'DD d MM',
                defaultStatus: '',
                isRTL: false
        };
 $.datepicker.setDefaults($.datepicker.regional['es'])
})

function dateFormat(date,format){
	var fecha="";
	if(date){
		fecha= date.split("-");
		if (format)
			var monthNames = new Array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		else
			var monthNames = new Array('Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic');
		fecha = fecha[2]+'-'+monthNames[fecha[1]-1]+'-'+fecha[0];	
	}
	return fecha;
}

function Calendario(input){
	jQuery("#"+input).datepicker({
		onSelect: function (date){
			$( "#"+input).val(dateFormat(date,false));
		}, 
		changeMonth: true,
		changeYear: true
	});
}
*/
function soloNumeros(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "1234567890";
   especiales = [8,37,39,46,160];

   tecla_especial = false
   for(var i in especiales){
    if(key == especiales[i]){
      tecla_especial = true;
      break;
    }
   }

   if(letras.indexOf(tecla)==-1 && !tecla_especial){
    return false;
   }
}

function soloDigito(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "1234567890";
   especiales = [8,37,39,160];

   tecla_especial = false
   for(var i in especiales){
    if(key == especiales[i]){
      tecla_especial = true;
      break;
    }
   }

   if(letras.indexOf(tecla)==-1 && !tecla_especial){
    return false;
   }
}