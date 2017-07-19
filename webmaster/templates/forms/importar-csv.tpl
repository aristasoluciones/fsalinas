<div class="row-fluid">
  <div class="tab-pane active" id="tab_0">
	<div style="margin:-11px" class="portlet" >
 <!-- <div class="portlet-title">
         <div class="caption"><i class="icon-reorder"></i>{if !$info.view}Ingrese los {/if}Datos</div>                
      </div>-->
      <div class="portlet-body form">
       <!-- BEGIN FORM-->
		<form id="frmImportarArchivo" action="#" class="form-horizontal form-bordered form-label-stripped">
		 <input type="hidden" name="type" value="importar-csv" >
		  <div class="form-body">
				<div class="form-group">
					<label class="control-label col-md-3"><span class="reqIcon"> * </span>Tipo de importacion</label>
					<div class="col-md-9">
						<select name="tipo" id="tipo" class="form-control">
							 <option value="">Seleccionar......</option>
							 <option value="producto">Productos</option>
							 <option value="categoria">Categorias</option>
						</select>
					</div>		
				</div>
				<div class="form-group">
					<label class="control-label col-md-3"><span class="reqIcon"> * </span>Adjuntar archivo</label>
					<div class="col-md-9">
							<input type="file" class="form-control" name="fileCsv" id="fileCsv" />
					</div>	
				</div> 
             </div>         
             </form>
                <!-- END FORM-->                  
            </div>
       </div>
    </div>
</div>