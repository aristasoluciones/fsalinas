<h3>Instrucciones:</h3>

1. Selecciona el RFC dentro de la lista de rfc´s.<br>
2. Si eres nuevo usuario selecciona nueva rfc y complementa el formulario.<br>
3. Presiona Guardar y Continuar.<br>
<br>
<br>
<br>
<b>Lista de RFC</b>
<select name="rfcId" id="rfcId" onChange="addRFC()">
	<option value="">Nuevo RFC</option>
	{foreach from=$lstRFC item=item key=key}   
	<option value="{$item.rfcCId}" {if $infoVta.rfcCId eq $item.rfcCId} selected {/if}>{$item.rfc}</option>
	{/foreach}
	
</select>
<div id="divRfc">
	{include file="{$DOC_ROOT}/templates/lists/rfc.tpl"}
</div>

<div class="txtErrMsg" style="color:red"></div>
<div class="loader" ></div>
<button class="button small" style="background:#622181" onclick="Next(2)">Guardar y Continuar</button>


