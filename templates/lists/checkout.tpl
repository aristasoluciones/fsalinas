<h4 class="subtitle"></h4>
<hr class="vertical-space1">
<ul id="myTab" class="nav nav-tabs"><!--
<li><a href="#Service1" data-toggle="tab">Web </a></li>-->
<li {if $infoVta.paso eq 1} class="active" {/if}><a href="#Service2" data-toggle="tab">Dirección de Envio</a></li>
<li {if $infoVta.paso eq 2} class="active" {/if}><a href="#Service3" data-toggle="tab">Información de Facturación</a></li>
<li {if $infoVta.paso eq 3} class="active" {/if}><a href="#Service4" data-toggle="tab">Metodo de Pago</a></li>
<li {if $infoVta.paso eq 4} class="active" {/if}><a href="#Service5" data-toggle="tab">Resumen</a></li>
</ul>
<div id="myTabContent" class="tab-content">
<!--
<div class="tab-pane" id="Service1">
<hr class="vertical-space1">
<article class="icon-box"><i class="li_lab"></i>
<h5 class="helvetic5">Web Design</h5>

<p>

</p>

</article>
</div>-->
<div class="tab-pane {if $infoVta.paso eq 1} active{/if}" id="Service2">
<hr class="vertical-space1">
<article class="icon-box">
<h5 class="helvetic5"></h5>
	{include file="{$DOC_ROOT}/templates/forms/direccion.tpl"}
</article>
</div>
<div class="tab-pane {if $infoVta.paso eq 2} active{/if}" id="Service3">
<hr class="vertical-space1">
<div class="icon-box">
<h5 class="helvetic5"></h5>
		{include file="{$DOC_ROOT}/templates/forms/facturacion.tpl"}
</div>
</div>
<div class="tab-pane {if $infoVta.paso eq 3} active{/if}" id="Service4">
<hr class="vertical-space1">
<article class="icon-box">
<h5 class="helvetic5"></h5>
Deposito Bancario

<br>
Pago en Sucursal
</article>
</div>
<div class="tab-pane {if $infoVta.paso eq 4} active{/if}" id="Service5">
<hr class="vertical-space1">
<article class="icon-box">
<h5 class="helvetic5"></h5>
<div class="txtErrMsg" style="color:red"></div>
<div class="loader" ></div>
<button class="button small" style="background:#622181" onclick="enviarPedido()">Enviar Pedido</button>
</article>
</div>
<div class="tab-pane {if $infoVta.paso eq 5} active{/if}" id="Service6">
<hr class="vertical-space1">
<article class="icon-box"><i class="fa-area-chart"></i>
<h5 class="helvetic5">Analytics</h5>
<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
</article>
</div>

</div><!-- end -->