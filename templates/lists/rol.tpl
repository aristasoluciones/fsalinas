<div class="table-container">
{include file="{$DOC_ROOT}/templates/boxes/messages.tpl"}
<table class="table table-striped table-bordered table-hover" id="sample_3">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Descripcion</th>
            <th>Acci&oacute;n </th>
        </tr>
    </thead>
    <tbody>
    	{foreach from=$registros.result item=item key=key}        	
        <tr>
            <td>{$item.Title}</td>
             <td>{$item.Description}</td>     
            <td><div align="center">
				<a href="javascript:void(0)" onClick="EditReg({$item.ID})" title="Editar tramite">
					<img src="{$WEB_ROOT}/images/png-icon/big/glyphicons_150_edit.png" border="0">
				</a>
				<a href="{$WEB_ROOT}/config_role/id/{$item.ID}" title="Configurar rol" data-toggle="modal" class="btn">
					<img src="{$WEB_ROOT}/images/png-icon/big/glyphicons_136_cogwheel.png">
				</a>
				
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