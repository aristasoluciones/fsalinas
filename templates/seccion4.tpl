<section class="container" >
				<hr class="vertical-space3">
<!-- Latest-from-Blog-start -->
    	<div class="latest-f-blog clearfix">
    		<div class="sixteen columns">
    			<div class="sub-content">
					<h1 class="h-sub-content">TE RECOMENDAMOS</h1>
				</div>
    		</div>
      		<div class="nine columns">
					<h2>Nota del Mes</h2>
       		 	<article class="blog-post clearfix ">
       		 		<figure class="pad-r20">
       		 			<img src="{$WEB_ROOT}/images/blog/1.jpg" alt="">
						{$infoNota.rutaImagen}
       		 		</figure>
         	 		<div class="one columns alpha">
            			<div class="blog-date-sec">
              				<h3></h3>
              				<span>||||</span>
              			</div>
          			</div>
	          	<div class="eight columns omega">
			
	            	<h4><a href="#">{$infoNota.titulo}</a></h4>
	              	<p class="blog-author"><strong></strong> {$infoNota.autor}<br>{$infoNota.fechaPublicacion}<strong></strong> <a href="#"></a></p>
	            <p class="blog-detail" style="text-align:justify">
				{$infoNota.texto}
				</p>
	            <a href=""  class="readmore">Ver</a> </div>
        </article>
      </div>
	  <!-- latest-f-blog-line-start -->
	  <div class="seven columns omega">
	  <h2>Promociones</h2>
		{foreach from=$lstPromoinde item=item key=key}  
      	<article class="blog-line clearfix">
          	<a href="#" class="img-hover"><img src="{$WEB_ROOT}/images/productos_categorias/{$item.nombre_archivo}{$item.extension}" alt=""></a>
			<a href="#" style="color:#622181; font-size:22px">{$item.nombre}</a>
			<br>
            <a href="#">{$item.descripcion}</a>

			  <p class="price"><small>$ {$item.precioAnterior}</small><span class="amount">$ {$item.precioActual}</span></p>
        </article>
		{/foreach}


      </div>
    </div>	
	
<hr class="vertical-space3">
</section>