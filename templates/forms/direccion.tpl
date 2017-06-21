<h3>Instrucciones:</h3>

1. Selecciona la dirección dentro de la lista de direcciones.<br>
2. Si eres nuevo usuario selecciona nueva sucursal y complementa el formulario.<br>
3. Presiona Guardar y Continuar.<br>
<br>
<br>
<br>
<b>Lista de Direcciones</b>
<select name="direccionId" id="direccionId" onChange="addDireccion()">
	<option value="">Nueva Direccion</option>
	{foreach from=$lstDir item=item key=key}   
	<option value="{$item.direccionCId}" {if $infoVta.direccionCId eq $item.direccionCId} selected {/if} >{$item.calle}</option>
	{/foreach}
	
</select>
<div id="divDirec">
	{include file="{$DOC_ROOT}/templates/lists/direccion.tpl"}
</div>

<div class="txtErrMsg" style="color:red"></div>
<div class="loader" ></div>
<button class="button small" style="background:#622181" onclick="Next(1)">Guardar y Continuar</button>