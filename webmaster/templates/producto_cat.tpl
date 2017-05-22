<!-- BEGIN PAGE HEADER-->
	<div class="page-bar">
		<div class="span12">           
			<h3 class="page-title">
				<!--Dependencia-->
			</h3>
		 <ul class="page-breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="index.html">Inicio</a> 
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<a href="#">Categoria de productos</a>
				<i class="fa fa-circle"></i>
			</li>
			<li><a href="#">Producto por categoria</a></li>
		</ul>
		</div>
	</div>
	 <!-- BEGIN PAGE TITLE-->
		<h1 class="page-title"> 
			<small></small>
		</h1>
	 <!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->

<!-- BEGIN PAGE CONTENT-->
	<div class="row ">
	   <div class="portlet light portlet-fit portlet-datatable bordered">
			<div class="portlet-title">
				<div class="caption">
				   <i class="icon-settings"></i>
				  Lista de productos de la categoria {$row.nombre}
				 </div>
				 <div class="actions">
				    <div class="btn-group btn-group-devided" data-toggle="buttons"> 
				    {if in_array('add_producto_categoria',$privilegios) or $typeUser==1}
					<a href="javascript:;" class="btn btn-circle sbold green" onClick="AddReg({$row.categoriaId})">
						Agregar <i class="fa fa-plus"></i>
					</a>
					{/if}
					</div>
			    </div>  
			</div>
			<div class="portlet-body" id="tblContent">
			 {include file="{$DOC_ROOT}/templates/lists/{$page}.tpl"}
			</div>
	   </div>
    </div>
	<!-- END PAGE CONTENT-->	