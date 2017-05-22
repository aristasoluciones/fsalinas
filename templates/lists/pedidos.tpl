{**include file="{$DOC_ROOT}/templates/boxes/messages.tpl"**}
<form id="frmGral" onsubmit="return false;">
<input type="hidden" name="type" id="type" value="updateCar">
<table class="table table-striped table-bordered table-hover" id="sample_3">
    <thead>
        <tr>
            <th width="200"><div align="center">#</div></th>
            <th width="200"><div align="center">Fecha de Solicitud</div></th>
            <th width="200"><div align="center">Num Productos</div></th>
            <th class="hidden-480" width="150"><div align="center">Subtotal</div></th>
            <th class="hidden-480" width="200"><div align="center">I.V.A.</div></th>
            <th class="hidden-480"><div align="center">Total</div></th>
            <th class="hidden-480"><div align="center">Estatus</div></th>
        </tr>
    </thead>
    <tbody>

    	{foreach from=$lstCar.carrito item=item key=key}        	
        <tr class="odd gradeX">
			<td>
			{$key+1}
			</td>
			<td>
				<img src="{$WEB_ROOT}/images/productos_categorias/{$item.nombre_archivo}{$item.extension}" alt="">
			</td>
            <td>
				{$item.nombre}<br>
				{$item.descripcion}
			</td>
			<td><div align="center">${$item.precioActual|number_format:2:'.':','}</div></td>
            <td><div align="center"><input type="" name="cantidad_{$key}" id="cantidad_{$key}" value="{$item.cantidad}" style="width:50px"></div></td>
            <td><div align="center">${$item.total|number_format:2:'.':','}</div></td>
            <td></td>

        </tr>
		
        {foreachelse}
        <tr class="odd gradeX">
        	<td colspan="6"><div align="center">Ning&uacute;n registro encontrado.</div></td>
        </tr>
        {/foreach}
    </tbody>
</table>
</form>

{include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$registros.pages info=$registros.info}