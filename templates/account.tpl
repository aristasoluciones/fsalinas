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
      <h3>Mi Cuenta</h3>
    </div>
</section>


<section class="container page-content" >
	
	
	
	
    <hr class="vertical-space2">
    <aside class="four columns sidebar leftside">
      <h4 class="subtitle">Menu</h4>
      <div class="listbox1">
        <ul>
          <li><a href="#">Información de tu Cuenta </a></li>
          <li><a href="#">Pedidos</a></li>
        </ul>
      </div>
      <!-- end-listbox1 -->
      <br class="clear">
    
      <!-- end-listbox1 -->
      <br class="clear">

    </aside>
   
   <section class="eleven columns">
		{include file="{$DOC_ROOT}/templates/lists/pedidos.tpl"}
      
      <hr>
   </section>
  
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