<div class="table-container">
{include file="{$DOC_ROOT}/templates/boxes/messages.tpl"}
<table class="table table-striped table-bordered table-hover" id="sample_3">
    <thead>
        <tr>
            <th>Nombre </th>
            <th>Descripcion </th>
			<th>A quien va dirigido </th>
			<th>Ventas </th>
            <th>Acci&oacute;n </th>
        </tr>
    </thead>
    <tbody>
    	{foreach from=$registros item=item key=key}        	
        <tr>
            <td>{$item.nombre}</td>
            <td>{$item.descripcion}</td>
            <td>{$item.aquien}</td>
			<td>{$item.ventajas}</td>
            <td><img src= />
            <a href="{$WEB_ROOT}/ajax/show_image.php?id={$item.categoriaId}"  title="Ver Imagen">
                    Ver imagen
                </a></td>
            <td><div align="center">
                {if in_array('edit_categoria',$privilegios) or $Usr.role_id eq 1}
				<a href="javascript:void(0)" onClick="EditReg({$item.categoriaId})" title="Editar categoria">
					<img src="{$WEB_ROOT}/images/icons/pencil-16.png" border="0">
				</a>
                {/if}
                {if in_array('add_pcategoria',$privilegios) or $Usr.role_id eq 1}
                <a href="{$WEB_ROOT}/producto_cat/id/{$item.categoriaId}"  title="Agregar producto">
                    <img src="{$WEB_ROOT}/images/icons/add-16.png" border="0">
                </a>
                {/if}
                 {if in_array('del_categoria',$privilegios) or $Usr.role_id eq 1}
                <a href="javascript:void(0)" onClick="DeleteReg({$item.categoriaId})" title="Eliminar categoria">
                    <img src="{$WEB_ROOT}/images/icons/delete.png" border="0">
                </a>
                {/if}
                				
            </div>
            </td>
        </tr>
        {foreachelse}
        <tr>
        	<td colspan="7"><div align="center">Ning&uacute;n registro encontrado.</div></td>
        </tr>
        {/foreach}
    </tbody>
</table>
</div>
<!-- {include file="{$DOC_ROOT}/templates/lists/pages.tpl" pages=$registros.pages info=$registros.info} -->