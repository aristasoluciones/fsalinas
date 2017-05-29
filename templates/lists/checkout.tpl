<h4 class="subtitle"></h4>
<hr class="vertical-space1">
<ul id="myTab" class="nav nav-tabs"><!--
<li><a href="#Service1" data-toggle="tab">Web </a></li>-->
<li {if $infoVta.paso eq 1} class="active" {/if}><a href="#Service2" data-toggle="tab">Dirección de Envio</a></li>
<li {if $infoVta.paso eq 2} class="active" {/if}><a href="#Service3" data-toggle="tab">Información de Facturación</a></li>
<li {if $infoVta.paso eq 3} class="active" {/if}><a href="#Service4" data-toggle="tab">Resumen</a></li>
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
	
<div class="txtErrMsg" style="color:red"></div>
<div class="loader" ></div>
{include file="{$DOC_ROOT}/templates/forms/resumen.tpl"}
<button class="button small" style="background:#622181" onclick="enviarPedido()">Enviar Pedido</button>
</article>
</div>


</div><!-- end -->