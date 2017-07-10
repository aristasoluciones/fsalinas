 <section class="eleven columns">
	<div class="shop-wrap">
	<p class="result-count">
	{$InfoCategoria.info}</p>
	<br class="clr">
	<div class="shop-wrap"> 
	{foreach from=$InfoCategoria.result item=item key=key}

		  <figure class="shop-item one_third">
			{if $item.promocion eq "si"}
				<span class="onsale">Oferta!</span>
			{/if}
				
			 <a href="{$WEB_ROOT}/dt/q/{$item.productoId}"><img src="{$WEB_ROOT}/images/productos_categorias/{$item.nombre_archivo}.{$item.extension}" alt=""></a>
			<figcaption>
				<h4><a href="{$WEB_ROOT}/dt/q/{$item.productoId}" style="color:#622181">{$item.nombre}</a> </h4>
				<font style="font-size:12px">{$item.sustancia}</font>
				  <p class="price">
					{if $item.promocion eq "si"}
					<small>$ {$item.precioAnterior}</small>
					{/if}
					<span class="amount">$ {$item.precioActual}</span>
				</p>
			</figcaption>
			<div class="product-shop "><a href="javascript:void(0)" onclick="addCar('{$item.productoId}')" class="addtocart">Agregar Al Carrito</a></div>
		  </figure>
		  
		  <div style="width:50px; overflow:hidden; float:left; !important">
		  &nbsp;
		  &nbsp;
		  </div>
		 
		{if $key % 3  eq 0}
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>




		{/if}

	{/foreach}
	</div>
	
		<hr class="vertical-space1">
      <div class="pagination2">
        <ul>
          <li class="disabled"><a href="#">&laquo;</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
	  <hr class="vertical-space2">
	</div>
	</section>
