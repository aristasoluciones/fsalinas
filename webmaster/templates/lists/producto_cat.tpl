<div class="table-container">
{include file="{$DOC_ROOT}/templates/boxes/messages.tpl"}
<table class="table table-striped table-bordered table-hover" id="sample_3">
   <thead>
       <th>Nombre del producto</th>
       <th>Categoria</th>
       <th>Despcripcion del producto</th>
       <th>Imagen</th>
       <th>Status</th>
       <th>acciones</th>
    </thead>
    <tbody>
    	{foreach from=$registros item=item key=key}        	
        <tr>
            <td>{$item.nombre}</td>
            <td>{$item.cat_name}</td>
            <td>{$item.descripcion}</td>
            <td>
              <div align="center">
               <a href="{$WEB_ROOT_IMG}/productos_categorias/{$item.nombre_archivo}.{$item.extension}"  title="Ver imagen" target="_blank">
                <img src="{$WEB_ROOT_IMG}/productos_categorias/{$item.nombre_archivo}.{$item.extension}" height="50px" width="100px">
              </div>

            </td>
            <td>{$item.status}</td>
    
            <td><div align="center">
                {if in_array('edit_pcat',$privilegios) or $typeUser==1}
				<a href="javascript:void(0)" onClick="EditReg({$item.producto_categoria_id})" title="Editar producto">
					<img src="{$WEB_ROOT}/images/icons/pencil-16.png" border="0">
				</a>
                {/if}
                {if in_array('active_pcat',$privilegios) or $typeUser==1}
                    {if $item.status=="Baja"}
                        <a href="javascript:void(0)" onClick="ActiveReg({$item.producto_categoria_id})" title="Activar producto">
                            <img src="{$WEB_ROOT}/images/icons/activar.png" border="0">
                        </a>
                    {else}
                    <a href="javascript:void(0)" onClick="RemoveReg({$item.producto_categoria_id})" title="Desactivar producto">
                        <img src="{$WEB_ROOT}/images/icons/desactivar.png" border="0">
                    </a>
                    {/if}
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