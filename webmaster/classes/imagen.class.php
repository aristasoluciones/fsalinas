<?php

class Imagen extends Main
{
	private $id;
	private $nombre;
	private $descripcion;
	private $producto_id;
	private $tipo;
	private $ruta;
	

	public function setId($value){
		$this->Util()->ValidateInteger($value);
		$this->id = $value;
	}
	public function setNombre($value){
		/*if($this->Util()->ValidateRequireField($value, 'Nombre')){*/
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->nombre = $value;
		/*}*/
	}
	public function setDescripcion($value){
		if($this->Util()->ValidateRequireField($value, 'Descripcion')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->descripcion = $value;
		}
	}	
	public function setProductoId($value){
		if($this->Util()->ValidateRequireField($value, ' Asignar a producto')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->producto_id = $value;
		}
	}
    public function setTipo($value){
		if($this->Util()->ValidateRequireField($value, 'Tipo')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->tipo= $value;
		}
	}
	public function setExtension($value){
		
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->extension= $value;
		
	}
	public function setFile($value){
		if($value["error"]===4)
		{
		  $this->Util()->setError(10136, 'error', '');
		}

		if($value["type"]!="image/jpeg"&&$value["type"]!="image/png")
		{
		  $this->Util()->setError(10138, 'error', '');
		}
		
	}
 
	//Ontener datos y listados
	public function Info(){
		$sql = 'SELECT * FROM categoria WHERE categoriaId = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();		
		return $info;
	}
	public function getLastId(){
		$sql = 'SELECT MAX(imagenId) FROM imagen';
		$this->Util()->DB()->setQuery($sql);
		$single = $this->Util()->DB()->GetSingle();		
		return $single;
	}
	
	
	public function EnumerateAll(){
		$sql = 'SELECT * FROM imagen';
		$this->Util()->DB()->setQuery($sql);
		$result = $this->Util()->DB()->GetResult();
		return $result;
	}
	
	public function Enumerate(){
		
		$sql = 'SELECT COUNT(*)	FROM catalogo_tramites WHERE status = "alta"';
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
		
		$resPage = $this->Util->HandlePagesAjax($this->page, $total , '');		
		$sqlLim = "LIMIT ".$resPage['pages']['start'].", ".$resPage['pages']['items_per_page'];
		 
		$sql = 'SELECT 
				*
				FROM catalogo_tramites 
				
				WHERE status = "alta"
				ORDER BY nombre_corto DESC
				'.$sqlLim;
		$this->Util()->DB()->setQuery($sql);
		$data['result'] = $this->Util()->DB()->GetResult();
		
		$data['pages'] = $resPage['pages'];
		$data['info'] = $resPage['info'];
					
		return $data;
		
	}//Enumerate
    //FUNCIONES DE VALIDACION
    
	public function Save(){
						
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		$sql = "
		INSERT INTO  imagen (
				`nombre`, 
				`categoriaId`,
				`ruta`,
				`modelo`,
				`descripcion`,
				`tipo`


				)
				VALUES (
				'".$this->nombre."',
				'".$this->producto_id."',
				'ruta',
				'modelo',
				'".$this->descripcion."',
				'".$this->tipo."'
				);
		";
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
			
		$this->Util()->setError(10129, 'complete', '');
		$this->Util()->PrintErrors();
		return true;	
	}//Save
	
	public function Update(){		
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		$sql = 'UPDATE 
				categoria SET 
				nombre = "'.$this->nombre.'",			
				descripcion = "'.$this->descripcion.'",
				aquien = "'.$this->aquien.'",
				ventajas = "'.$this->ventaja.'"
				
				WHERE categoriaId = "'.$this->id.'"';
				
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
			
		$this->Util()->setError(10130, 'complete', '');
		$this->Util()->PrintErrors();
		
		return true;
	}//Update
	public function UpdateData(){		
		$sql = 'UPDATE 
				imagen SET 
				nombre = "'.$this->nombre.'",			
				extension = "'.$this->extension.'"
				WHERE imagenId = "'.$this->id.'"';
				
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
	   return true;
	}//Update
	public function RollBackData(){		
		$sql = 'DELETE * FROM imagen where imagenId = "'.$this->id.'"';
				
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->DeleteData();
	   return true;
	}//Update
	
	public function Delete(){
		
		$sql = 'UPDATE 
				categoria SET 
				status = "baja"
				WHERE categoriaId = "'.$this->id.'"';
				
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
			
		$this->Util()->setError(3, 'error', '');
		$this->Util()->PrintErrors();
		
		return true;
		
	}//
	
	
						
}

?>