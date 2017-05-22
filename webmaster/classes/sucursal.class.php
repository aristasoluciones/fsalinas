<?php

class Sucursal extends Main
{
	private $id;
	private $nombre;
	private $descripcion;
	private $encargado;
	private $direccion;

	public function setId($value){
		$this->Util()->ValidateInteger($value);
		$this->id = $value;
	}
	public function setNombre($value){
		if($this->Util()->ValidateRequireField($value, 'Nombre')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->nombre = $value;
		}
	}
	public function setDescripcion($value){
		if($this->Util()->ValidateRequireField($value, 'Descripción')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->descripcion = $value;
		}
	}
	public function setEncargado($value){
		if($this->Util()->ValidateRequireField($value, 'Encargado')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->encargado = $value;
		}
	}
	public function setDireccion($value){
		if($this->Util()->ValidateRequireField($value, 'Dirección')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->direccion = $value;
		}
	}
    
    
    
	
	public function Info(){
		$sql = 'SELECT * FROM sucursal WHERE sucursalid = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();		
		return $info;
	}
	
	public function EnumerateAll(){
		$sql = 'SELECT * FROM sucursal';
		$this->Util()->DB()->setQuery($sql);
		$results = $this->Util()->DB()->GetResult();
		return $results;
	}
	
	public function Enumerate(){
		
		$sql = 'SELECT COUNT(*)	FROM requisitos';
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
		
		$resPage = $this->Util->HandlePagesAjax($this->page, $total , '');		
		$sqlLim = "LIMIT ".$resPage['pages']['start'].", ".$resPage['pages']['items_per_page'];
		 
		$sql = 'SELECT 
				*
				FROM requisitos 
				ORDER BY nombre DESC
				'.$sqlLim;
		$this->Util()->DB()->setQuery($sql);
		$data['result'] = $this->Util()->DB()->GetResult();
		
		$data['pages'] = $resPage['pages'];
		$data['info'] = $resPage['info'];
					
		return $data;
		
	}//Enumerate
	
	public function Save(){
						
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		$sql = "
		INSERT INTO  sucursal (
				`nombre`, 
				`productos`,
				`encargado`,
				`direccion`
				)
				VALUES (
				'".$this->nombre."',
				'".date('Y-m-d')."',
				'".$_SESSION['Usr']['usuario']."'
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
				sucursal SET 
				nombre = "'.$this->nombre.'",
				productos = "'.$this->descripcion.'",
				encargado = "'.$this->encargado.'",
				direccion = "'.$this->direccion.'"					
				
				WHERE sucursalid = "'.$this->id.'"';
				
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
			
		$this->Util()->setError(10130, 'complete', '');
		$this->Util()->PrintErrors();
		
		return true;
	}//Update
	
	public function Delete(){
		
		$sql = 'UPDATE 
				requisitos SET 
				status = "baja"
				WHERE catalogo_tramite_id = "'.$this->id.'"';
				
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
			
		$this->Util()->setError(3, 'error', '');
		$this->Util()->PrintErrors();
		
		return true;
		
	}//Delete
	
	
						
}

?>