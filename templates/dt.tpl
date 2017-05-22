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

<body class="" >
	<div id="wrap" class="colorskin-0">
			
				{include file="{$DOC_ROOT}/templates/menus/main.tpl"}


  <section id="headline">
    <div class="container">
      <h3>{$infoPo.nombre}</h3>
    </div>
  </section>
   <section class="container page-content" >
    <hr class="vertical-space2">
    <section class="eleven columns">
		<div class="shop-wrap">
      <figure class="shop-item one_half">
	  <span class="onsale">Oferta!</span>
         <img src="images/shopimg/cons.jpg" alt="">		 </figure>
      <!-- end-product-item-->
	  <div class="one_half column-last">
		  <h1>{$infoPo.nombre}</h1>
		  <h2 class="price"><small>{$infoPo.precioAnterior}</small><span class="amount">$ {$infoPo.precioActual}</span></h2>
		  <p>{$infoPo.descripcion}</p>
		  <hr class="vertical-space">
		  <div class="quantity buttons_added">
		  <input class="minus" type="button" value="-"><input type="text" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text"><input class="plus" type="button" value="+">
		  <a href="#" class="addtocart">Agregar al Carrito</a>
		  </div>
		  <!--<div class="quantity buttons_added">
		  <input class="minus" type="button" value="-"></input><input type="text" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text"><input class="plus" type="button" value="+"></input>
		<!--  <a href="#" class="addtocart">Add to Cart</a>
		  </div>-->
	  </div> 
	  	  
<hr class="vertical-space1">

      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#Description" data-toggle="tab">Caracteristicas</a></li>
        <li><a href="#Reviews" data-toggle="tab">Solicitar Información</a></li>
      </ul>
	  
	  <div id="myTabContent" class="tab-content">
        <div class="tab-pane active" id="Description">
          <hr class="vertical-space1">
          <p>descripcion</p>
        </div>
        <div class="tab-pane" id="Reviews">
          <hr class="vertical-space1">
		   <h5><strong>Informacion</strong></h5>
			<p>Por favor envianos un mensaje y uno de nuestros asesores se pondra en contacto contigo</p>
			<!--<h5><strong>Be the first to review “Product”</strong></h5>-->
			<label>Nombre</label> 
			<input name="" type="text">
			<label>Correo</label> 
			<input name="" type="text">
			<label>Mensaje</label> 
			<textarea name="" cols="" rows=""></textarea>
			<br>
			<input name="" type="submit" class="small" value="Enviar">
        </div>       
        
      </div>
	  
	  <hr class="vertical-space2">
	  
	  
      <!-- end-product-item-->
	  </div>

	</section>
    <!-- end-main-content -->
	
    <aside class="four columns offset-by-one sidebar">
      <div class="side-cart">
	  <h4 class="subtitle"><i class="fa-shopping-cart"></i>Carrito de Compras</h4>
        <ul class="side-list">
          <li><button type="button" class="close" data-dismiss="alert">&times;</button>
		  <a href="#"><img src="images/shopimg/mex-prod03.jpg" alt=""></a>
		  <h5><a href="#">Nombre del Producto</a></h5>
		  <p class="price"><span class="amount">$ 58</span></p>
		  </li>
          <li><button type="button" class="close" data-dismiss="alert">&times;</button>
		  <a href="#"><img src="images/shopimg/mex-prod05.jpg" alt=""></a>
		  <h5><a href="#">Nombre del Producto</a></h5>
		  <p class="price"><span class="amount">$ 58</span></p>
		  </li>
          <li><button type="button" class="close" data-dismiss="alert">&times;</button>
		  <a href="#"><img src="images/shopimg/mex-prod09.jpg" alt=""></a>
		  <h5><a href="#">Nombre del Producto</a></h5>
		  <p class="price"><span class="amount">$ 58</span></p>
		  </li>
          <li><button type="button" class="close" data-dismiss="alert">&times;</button>
		  <a href="#"><img src="images/shopimg/mex-prod07.jpg" alt=""></a>
		  <h5><a href="#">Nombre del Producto</a></h5>
		  <p class="price"><span class="amount">$ 58</span></p>
		  </li>
        </ul>
		<!--<p class="total">Subtotal: <strong>$123</strong></p>-->
		<button class="button small">Ver Carrito</button> 
      </div>
	  <br class="clear">
      <h4 class="subtitle">Promociones</h4>
      <div class="side-list">
        <ul>
          <li>
		  <a href="#"><img src="images/shopimg/mex-prod03.jpg" alt=""></a>
		  <h5><a href="#">Limpieza</a></h5>
		  <p class="price"><span class="amount">$ 58</span></p>
		  </li>
          <li>
		  <a href="#"><img src="images/shopimg/mex-prod05.jpg" alt=""></a>
		  <h5><a href="#">Otro </a></h5>
		  <p class="price"><span class="amount">$ 58</span></p>
		  </li>
          <li><a href="#"><img src="images/shopimg/mex-prod09.jpg" alt=""></a>
		  <h5><a href="#">Otro</a></h5>
		  <p class="price"><span class="amount">$ 58</span></p>
		  </li>
          <li><a href="#"><img src="images/shopimg/mex-prod07.jpg" alt=""></a>
		  <h5><a href="#">Otro</a></h5>
		  <p class="price"><span class="amount">$ 58</span></p>
		  </li>
        </ul>
      </div>
      <!-- end-product-list -->
      <br class="clear">
      <!--
	  <h4 class="subtitle">Text Widget</h4>
      <p>Morlem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor<a href="#"> exercitation</a> ut labore et dolore magna aliqua. Ut enim ad</p>
-->
      <br class="clear">

    </aside>
    <!-- end-sidebar-->
    <br class="clear">
  </section>

    </div>
  {**include file="{$DOC_ROOT}/templates/seccion3.tpl"**}
	{include file="{$DOC_ROOT}/templates/footer.tpl"}
			
	{include file="{$DOC_ROOT}/templates/3-default-js.tpl"}
	<script type="text/javascript">
		jQuery(document).ready(function() {    
		   App.init(); // initlayout and core plugins		   
		});
	</script>
    
</body>
</html>