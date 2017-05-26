<?php

class Cliente extends Main
{
	private $id;
	private $nombre;
	private $telefono;
	private $email;
	private $usuario;
	private $passwd;
	private $tipo;
	private $activo;
	private $establoId;
	private $dependenciaId;
	private $tiporeporte;
	private $apaterno;
	private $amaterno;
	private $calle;
	private $noexterior;
	private $colonia;
	private $ciudad;
	private $estado;
	private $pais;
	
	
	
	public function tipoReporte($value){
		// $this->Util()->ValidateInteger($value);
		$this->tiporeporte = $value;
	}
	
	
	public function setId($value){
		$this->Util()->ValidateInteger($value);
		$this->id = $value;
	}
	
	
	public function setDependenciaId($value){
		$this->Util()->ValidateInteger($value);
		$this->dependenciaId = $value;
	}
	
	
	public function setDireccion($value){	
		if($this->Util()->ValidateRequireField($value, 'Direccion')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->direccion = $value;
		}		
	}
	
	public function setCalle($value){	
		if($this->Util()->ValidateRequireField($value, 'Calle')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->calle = $value;
		}		
	}
	public function setPaterno($value){	
		if($this->Util()->ValidateRequireField($value, 'Apellido paterno')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->apaterno = $value;
		}		
	}
	public function setMaterno($value){	
		if($this->Util()->ValidateRequireField($value, 'Apellido materno')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->amaterno = $value;
		}		
	}
	
	public function setNoExterior($value){	
		if($this->Util()->ValidateRequireField($value, 'No. Exterior')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->noexterior = $value;
		}		
	}
	
	public function setColonia($value){	
		if($this->Util()->ValidateRequireField($value, 'Colonia')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->colonia = $value;
		}		
	}
	
	public function setCiudad($value){	
		if($this->Util()->ValidateRequireField($value, 'Ciudad')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->ciudad = $value;
		}		
	}
	
	public function setEstado($value){	
		if($this->Util()->ValidateRequireField($value, 'Estado')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->estado = $value;
		}		
	}
	
	public function setPais($value){	
		if($this->Util()->ValidateRequireField($value, 'Pais')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->pais = $value;
		}		
	}
	
	
	public function setNombre($value){	
		if($this->Util()->ValidateRequireField($value, 'Nombre')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->nombre = $value;
		}		
	}
	
	public function setTelefono($value){
		$this->Util()->ValidateString($value, 100, 0, '');
		$this->telefono = $value;
	}
	
	public function setEmail($value, $validate = false){	
		if($this->Util()->ValidateRequireField($value, 'Email')){
			if($validate)
				$this->Util()->ValidateMail($value);
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->email = $value;			
		}		
	}
	
	public function setUsuario($value){	
		if($this->Util()->ValidateRequireField($value, 'Usuario')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->usuario = $value;
		}		
	}
	
	public function setPasswd($value){	
		if($this->Util()->ValidateRequireField($value, 'Contrase&ntilde;a')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->passwd = $value;
		}		
	}
	
	public function setTipo($value){	
		$this->Util()->ValidateString($value, 100, 0, '');
		$this->tipo = $value;
	}
	
	public function setActivo($value){	
		$this->Util()->ValidateString($value, 100, 0, '');
		$this->activo = $value;
	}
		
	public function Info(){
		
		$sql = 'SELECT * FROM clientes WHERE clienteId = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
		return $info;
	}//Info
	
	public function Enumerate(){
		
		$sql = 'SELECT * FROM clientes ORDER BY nombre ASC';
		$this->Util()->DB()->setQuery($sql);
		$registros = $this->Util()->DB()->GetResult();
							
		return $registros;
		
	}//EnumerateAll
	
	public function EnumerateAllChat(){
		
		$sql = 'SELECT * FROM  dependencia
				WHERE 1
				ORDER BY nombre ASC';
		$this->Util()->DB()->setQuery($sql);
		$dep = $this->Util()->DB()->GetResult();
		
		end($dep);
		$key1 = key($dep) + 1;
		$dep[$key1]["dependenciaId"] =  0;
		$dep[$key1]["nombre"] =  "sin Asignar";
		
		
		foreach($dep as $key=>$aux){
			$sql = 'SELECT *, usuarioId AS idReg FROM usuario 
				WHERE usuarioId > 1 and (tipo = "funcionario" or tipo = "admin") and dependenciaId = '.$aux["dependenciaId"].'
				ORDER BY nombre ASC';
			$this->Util()->DB()->setQuery($sql);
			$registros = $this->Util()->DB()->GetResult();
			$dep[$key]["usuarios"] = $registros;
		}
		
			// echo "<pre>"; print_r($dep);
		// exit;	
		return $dep;
		
	}//EnumerateAll
		
	public function EnumerateAll(){
		
		$filtro ="";
		
		
		
		 $sql = 'SELECT COUNT(*)	FROM cliente WHERE statuseliminado = "no" '.$filtro.'';
		
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
		
		$resPage = $this->Util->HandlePagesAjax($this->page, $total , '');		
		$sqlLim = "LIMIT ".$resPage['pages']['start'].", ".$resPage['pages']['items_per_page'];
		 
		 $sql = 'SELECT *, clienteId AS idReg FROM cliente 
				WHERE statuseliminado = "no" '.$filtro.'
				ORDER BY nombre ASC
				'.$sqlLim;
				
				// exit;
		$this->Util()->DB()->setQuery($sql);
		$data['result'] = $this->Util()->DB()->GetResult();
		
		// echo "<pre>"; print_r($data);
		
		$data['pages'] = $resPage['pages'];
		$data['info'] = $resPage['info'];
					
		return $data;
		
	}//Enumerate
	
	public function Save(){
						
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		 $sql = 'INSERT INTO cliente (
			nombre, 
			direccion
		)
		VALUES(
			"'.$this->nombre.'",
			"'.$this->direccion.'"
		)';
		// exit;
		$this->Util()->DB()->setQuery($sql);
		$this->id = $this->Util()->DB()->InsertData();
			
		$this->Util()->setError(10112, 'complete', '');
		$this->Util()->PrintErrors();
		
		return true;
		
	}//Save
	
	
	public function Update(){
						
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		
		$sql = 'UPDATE clientes SET 
				nombre = "'.$this->nombre.'",
				apaterno = "'.$this->apaterno.'",
				amaterno = "'.$this->amaterno.'",
				email = "'.$this->email.'"
				WHERE clienteId = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
			
		$this->Util()->setError(6, 'complete', '');
		$this->Util()->PrintErrors();
		
		return true;
		
	}//Update
	
	public function Delete(){		
		
		$sql = 'UPDATE clientes SET 
				activo = "no"
				WHERE clienteId = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
			
		$this->Util()->setError(4, 'complete', '');
		$this->Util()->PrintErrors();
		
		return true;
		
	}//Delete
	public function Activar(){		
		
		$sql = 'UPDATE clientes SET 
				activo = "si"
				WHERE clienteId = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
			
		$this->Util()->setError(5, 'complete', '');
		$this->Util()->PrintErrors();
		
		return true;
		
	}//Delete
	
}

?>