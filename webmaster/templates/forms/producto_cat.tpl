<div class="row-fluid">
  <div class="tab-pane active" id="tab_0">
	<div style="margin:-11px" class="portlet" >
 <!-- <div class="portlet-title">
         <div class="caption"><i class="icon-reorder"></i>{if !$info.view}Ingrese los {/if}Datos</div>                
      </div>-->
      <div class="portlet-body form">
       <!-- BEGIN FORM-->
		<form id="frmGral" action="#" class="form-horizontal form-bordered form-label-stripped">
		  
			{if $info}
			 <input type="hidden" name="categoria_id" value="{$info.categoria_id}" />
			 <input type="hidden" name="type" value="update_pcat" />
			 <input type="hidden" name="pcat_id" value="{$info.producto_categoria_id}" />
            {else}
            <input type="hidden" name="categoria_id" value="{$info2.categoriaId}" />
			<input type="hidden" name="type" value="save_pcat" />
			{/if}
		  <div class="form-body">
				<div class="form-group">
					<label class="control-label col-md-3"><span class="reqIcon"> * </span>Nombre</label>
					<div class="col-md-9">
						{if !$info}
							<input type="text" class="form-control" name="nombre" value=""  />
						{else}
							<input type="text" class="form-control" name="nombre" value="{$info.nombre}"  />
						{/if}
					</div>
							
				</div>
				<div class="form-group">
				 <label class="control-label col-md-3"><span class="reqIcon"> * </span> Descripcion</label>
					<div class="col-md-9">
					 {if !$info}
						<textarea  name="descripcion" class="form-control"></textarea>
					{else}
						<textarea name="descripcion" class="form-control" >{$info.descripcion}</textarea>
					{/if}
					</div>
				 </div>
				 <div class="form-group">
				 <label class="control-label col-md-3"><span class="reqIcon"> * </span> Imagen del producto </label>
					<div class="col-md-9">
					 {if !$info}
						<input type="file" name="img_pcat" id="img_pcat" class="form-control" />
					{else}
						<input type="file" name="img_pcat" id="img_pcat" class="form-control" />
					{/if}
					</div>
				 </div>
				 
             </div>         
             </form>
                <!-- END FORM-->                  
            </div>
       </div>
    </div>
</div>