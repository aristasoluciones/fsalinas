<?php

class Pedido extends Main
{
	private $id;
	private $sucursalId;


	public function setId($value){
		$this->Util()->ValidateInteger($value);
		$this->id = $value;
	}
	
	public function setSucursalId($value){
		$this->Util()->ValidateInteger($value);
		$this->sucursalId = $value;
	}
	
	//Ontener datos y listados
	public function Info(){
		$sql = 'SELECT * FROM ventas WHERE ventaId = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();		
		return $info;
	}	

	public function DetallePedido(){

		$sqld = 'SELECT * FROM datosempresa WHERE datoEmpresaId = 1';
		$this->Util()->DB()->setQuery($sqld);
		$datos= $this->Util()->DB()->GetRow();		
		

		$sql = 'SELECT * FROM detalleventas a INNER JOIN productos_categorias b ON a.productoId=b.producto_categoria_id WHERE a.ventaId = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		

		 $sql2 = 'SELECT CONCAT_WS(" ",b.nombre,b.apaterno,b.amaterno) as cliente, a.fecha as fecha, a.direccionId,a.folio as folio,a.estatus FROM ventas a INNER JOIN clientes b ON a.clienteId=b.clienteId  WHERE a.ventaId='.$this->id.' ';
	    $this->Util()->DB()->setQuery($sql2);
		$row= $this->Util()->DB()->GetRow();

		$sql3 = 'SELECT * FROM direcciones  WHERE direccionId'.$row["direccionId"];
	    $this->Util()->DB()->setQuery($sql2);
		$row_dir= $this->Util()->DB()->GetRow();

		$data["productos"] = $result;
		$data["cliente"] =  $row;
		$data["direccion"] = $row_dir;
		$data["datosempresa"] = $datos;
      
        return $data;

	}
	public function Enumerate(){
		
		$filtro = "";
		if($this->sucursalId){
			$filtro .= " and sucursalId = ".$this->sucursalId."";
		}
		
		$sql = 'SELECT COUNT(*)	FROM ventas a INNER JOIN clientes b ON a.clienteId=b.clienteId where 1 '.$filtro.'';
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
		
		$resPage = $this->Util->HandlePagesAjax($this->page, $total , '');		
		$sqlLim = "LIMIT ".$resPage['pages']['start'].", ".$resPage['pages']['items_per_page'];
		 
		 $sql = 'SELECT 
				a.*,
				CONCAT_WS(" ",b.nombre,b.apaterno,b.amaterno) AS cliente
				FROM  
				ventas a INNER JOIN clientes b ON a.clienteId=b.clienteId where 1 '.$filtro.'
				ORDER BY a.fecha DESC
				'.$sqlLim;
			
		$this->Util()->DB()->setQuery($sql);
		$data['result'] = $this->Util()->DB()->GetResult();
		
		$data['pages'] = $resPage['pages'];
		$data['info'] = $resPage['info'];
					
		return $data;
		
	}//Enumerate
    //FUNCIONES DE VALIDACION
    

	public function Delete(){
		
		$sql = 'UPDATE 
				ventas SET 
				estatus = "cancelado"
				WHERE ventaId = "'.$this->id.'"';
				
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();

		$this->Util()->setError(4, 'complete', 'Se ha cancelado conrrectamente');
		$this->Util()->PrintErrors();
		return true;
		
	}//
	public function Activar(){
		
		$sql = 'UPDATE 
				ventas SET 
				estatus = "captura"
				WHERE ventaId = "'.$this->id.'"';
				
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();

		$this->Util()->setError(4, 'complete', 'Se ha activado conrrectamente');
		$this->Util()->PrintErrors();
		return true;
		
	}//
	public function DeleteCategoria(){
		
		$sql = 'UPDATE 
				categoria SET 
				status = "Baja"
				WHERE categoriaId = "'.$this->id.'"';
				
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();

		$this->Util()->setError(4, 'complete', '');
		$this->Util()->PrintErrors();
		return true;
		
	}//
	
						
}

?>