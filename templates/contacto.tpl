<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en" class="no-js"> <!--<![endif]-->
<head><!--
	{include file="{$DOC_ROOT}/templates/1-default-meta.tpl"}
	{include file="{$DOC_ROOT}/templates/2-default-css.tpl"}-->
	{include file="{$DOC_ROOT}/templates/header.tpl"}
</head>

<body  onload="initialize()">
	<div id="wrap" class="colorskin-0">
		<div id="sticker">
			<header id="header">
				<div  class="container">
					<div class="four columns">
					<div class="logo">
					<a href="#"><img src="{$WEB_ROOT}/images/logo-1.png" width="" id="img-logo" alt="logo"></a>
					</div>
					</div>		
				{include file="{$DOC_ROOT}/templates/menus/main.tpl"}
				</div>
				<div id="search-form2">
					<form action="#" method="get">
						<input type="text" class="search-text-box2">
					</form>
				</div>
			</header>
		</div>
			{**include file="{$DOC_ROOT}/templates/slider.tpl"}
			{include file="{$DOC_ROOT}/templates/seccion1.tpl"}
			{include file="{$DOC_ROOT}/templates/seccion2.tpl"}
			{include file="{$DOC_ROOT}/templates/seccion3.tpl"}
			{include file="{$DOC_ROOT}/templates/footer.tpl"**}
			
			<section id="headline">
	
				<div class="container">
				<!-- end-hero-->
				<h3>OFICINAS CENTRALES EMFRICH</h3>
					
				</div>
				
			</section>
			<section class="container page-content" >

				<hr class="vertical-space3">
				<div class="seven columns contact-inf">

				<h4>Información de Contacto:</h4>
				<br>

				<p><strong>Dirección:</strong></p>
				<p>
				 15 Norte entre 5a y 6a poniente, Tuxtla Gutierrez Chiapas,C.p 29000  </p>
				<div style="top:100%; position:relative;  ">
				<a href="#map_canvas">
					<img src="images/maps-ico.jpg" width="10%">
					¿Como llegar?</a>
				</div>
				<br>
				<p><strong>Telefonos:</strong></p>
				<p>
				<br />
				  <br />
				
				</p>
				<br />
				<p><strong>Email:</strong></p>
				<p>
				ventas@emfrich.com.mx<br />				
				</p>
				<br />
				<hr class="boldbx">
				<p>
				<br>
				</div>

				<div class="eight columns offset-by-one">
				<div class="contact-form">
				<div class="clr"></div><br />


				<form id="frmGral" name="" method="post">
					<input type="hidden" name="type" id="type" value="enviarCorreo">
					<h5>Nombre</h5>
					<input id="txtName" title="Se Necesita el Nombre" name="txtName" type="text" class="txbx" value="" required/><br />
					<h5>Correo</h5>
					<input id="txtEmail" name="email" type="email"  pattern="" class="txbx" value="" required/><br />
					<h5>Teléfono</h5>
					<input id="txtEmail" title="Solo Numeros" name="telefono" type="text" class="txbx" value="" required/><br />
					<h5>Asunto</h5>
					<input id="txtSubject" name="asunto" type="text" class="txbx" value="" required/><br />
					<div class="erabox">
					<h5>Mensaje</h5>
					<textarea id="txtText" name="mensaje" class="txbx era" required/></textarea><br />
					

					<div id="spanMessage">
					</div>
					</div>
				</form>
					<div id="respuesta"></div>
					
					<button  onclick="enviarCorreo()" class="sendbtn btnSend">Enviar</button>



				</div><!-- end-contact-form  -->

				</div>
				<div class="white-space"></div>
			</section>
			<section class="full-width">
			<div id="contact-map">
			 <div id="map_canvas" style="width:1500px; height:500px"></div>
			 <!-- END-Google Map -->
			</div><!-- END-contact Map -->     
			</section><!-- END-Google Map Section -->
							
	</div>
	{include file="{$DOC_ROOT}/templates/3-default-js.tpl"}
	<script type="text/javascript">
		jQuery(document).ready(function() {    
		   App.init(); // initlayout and core plugins		   
		});
	</script>

    
</body>
</html>