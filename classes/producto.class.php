<?php

class Producto extends Main
{
	private $id;
	private $nombre;
	private $presentacion;
	private $costo;
	private $vAdministracion;

	public function setId($value){
		$this->Util()->ValidateInteger($value);
		$this->id = $value;
	}
	
	public function setEstabloId($value){
		if($this->Util()->ValidateRequireField($value, 'Seleccione un establo'))
			$this->establoId = $value;
	}
	
	public function setNombre($value){	
		if($this->Util()->ValidateRequireField($value, 'Nombre')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->nombre = $value;
		}		
	}
	
	public function setCalle($value){	
		if($this->Util()->ValidateRequireField($value, 'Calle')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->calle = $value;
		}		
	}
	
	public function setnumeroInterior($value){	
		if($this->Util()->ValidateRequireField($value, 'Numero Interior')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->numeroInterior = $value;
		}		
	}
	
	public function setnumeroExterior($value){	
		if($this->Util()->ValidateRequireField($value, 'Numero Exterior')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->numeroExterior = $value;
		}		
	}
	
	
	public function setentreCalle1($value){	
		if($this->Util()->ValidateRequireField($value, 'Entre Calle 1')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->entreCalle1 = $value;
		}		
	}
	
	
	public function setentreCalle2($value){	
		if($this->Util()->ValidateRequireField($value, 'Entre Calle 2')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->entreCalle2 = $value;
		}		
	}
	
	public function setReferencias($value){	
		if($this->Util()->ValidateRequireField($value, 'Referencias')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->referencias = $value;
		}		
	}
	
	

				
	public function setCp($value){
		if($this->Util()->ValidateRequireField($value, 'Codigo Postal')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->cp = $value;
		}
	}
	
	
	public function setColonia($value){
		if($this->Util()->ValidateRequireField($value, 'Colonia')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->colonia = $value;
		}
	}
	
	public function setMunicipio($value){
		if($this->Util()->ValidateRequireField($value, 'Municipio')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->municipio = $value;
		}
	}
	
	
	public function setEstadoId($value){
		if($this->Util()->ValidateRequireField($value, 'Estado')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->municipioId = $value;
		}
	}
	
	public function setTelefono($value){
		if($this->Util()->ValidateRequireField($value, 'Telefono')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->telefon = $value;
		}
	}
	
	public function setCosto($value, $validate = false){
		if($this->Util()->ValidateRequireField($value, 'Costo')){
			if($this->Util()->ValidateRequireField($value, 'Costo')){
				$this->costo = $value;			
			}		
		}
	}
	
	public function setVAdministracion($value){	
		if($this->Util()->ValidateRequireField($value, 'Via de administracion')){
			$this->Util()->ValidateString($value, 2550, 0, 'Via de administracion');
			$this->vAdministracion = $value;
		}		
	}

		
	public function Info(){
		
		$sql = 'SELECT *, productoId AS idReg FROM producto WHERE productoId = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
				
		$info['estado'] = $this->Util()->GetNomEstado($info['estadoId']);
		$info['municipio'] = $this->Util()->GetNomMunicipio($info['municipioId']);
				
		return $info;
	}//Info
	
	public function CompleteProduct($nombre){
		
		$sql = "SELECT * FROM producto 
				WHERE nombre LIKE '".$nombre."%'
				ORDER BY nombre ASC
				LIMIT 10
		";
		$this->Util()->DB()->setQuery($sql);
		$registros = $this->Util()->DB()->GetResult();
							
		return $registros;
		
	}//EnumerateAll
	
	public function EnumerateAll(){
	
		if(!empty($this->establoId)){
			$dato = " AND establoId = '".$this->establoId."'";
		}
		
		$sql = "SELECT *, productoId AS idReg FROM producto 
				WHERE statusReg = 'activo'
				".$dato."
				ORDER BY nombre ASC";
		$this->Util()->DB()->setQuery($sql);
		$registros = $this->Util()->DB()->GetResult();
							
		return $registros;
		
	}//EnumerateAll
		
	public function Enumerate($parametro = array() ){
		
		if($parametro['filtro']){

			if(!empty($parametro['nombre'])){
				$sqlF .= " AND nombre LIKE '".$parametro['nombre']."%'";
			}
			if(!empty($parametro['vAdministracion'])){
				$sqlF .= " AND vAdministracion = '".$parametro['vAdministracion']."' ";
			}
			
			if(!empty($parametro['establoId'])){
				$sqlF .= " AND establoId = '".$parametro['establoId']."' ";
			}
		
		}

		
		$sql = "SELECT COUNT(*)	FROM producto WHERE statusReg = 'activo' ".$sqlF."";
		$this->Util()->DB()->setQuery($sql);
		$total = $this->Util()->DB()->GetSingle();
		
		$resPage = $this->Util->HandlePagesAjax($this->page, $total , '');		
		
		$sqlLim = "LIMIT ".$resPage['pages']['start'].", ".$resPage['pages']['items_per_page'];
		 
		$sql = "SELECT *, productoId AS idReg FROM producto 
				WHERE statusReg = 'activo'
				".$sqlF."
				ORDER BY nombre ASC
				".$sqlLim;
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
		
		$sql = '
			INSERT INTO producto 
			(
				nombre, 
				presentacion,
				costo, 
				vAdministracion,
				establoId
			)
			VALUES(
				"'.$this->nombre.'", 
				"'.$this->presentacion.'",
				"'.$this->costo.'", 
				"'.$this->vAdministracion.'",
				"'.$this->establoId.'"
			)
		';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
			
		$this->Util()->setError(10112, 'complete', '');
		$this->Util()->PrintErrors();
		
		return true;
		
	}//Save
	
	public function Update(){
						
		if($this->Util()->PrintErrors()){ 
			return false; 
		}

		$sql = 'UPDATE producto SET 
				nombre = "'.$this->nombre.'", 
				presentacion = "'.$this->presentacion.'", 
				costo = "'.$this->costo.'", 
				vAdministracion = "'.$this->vAdministracion.'",
				establoId = "'.$this->establoId.'"
				
				WHERE productoId = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
			
		$this->Util()->setError(10113, 'error', '');
		$this->Util()->PrintErrors();
		
		return true;
		
	}//Update
	
	public function Delete(){
		
		$sql = 'UPDATE producto SET 
				statusReg = "inactivo"
				WHERE productoId = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->UpdateData();
		
		$this->Util()->setError(10114, 'error', '');
		$this->Util()->PrintErrors();
		
		return true;
		
	}//Delete
	
	public function detalleCarrito(){
		
		$ikey =  New Ikey;
		
		if(!is_array($_SESSION["carrito"]))
		$_SESSION["carrito"]=array();
		
		$total = 0;
		foreach($_SESSION["carrito"] as $key=>$aux){
			
			$ikey->setValor($aux["Id"]);
			$ikey->setCampo('producto_categoria_id');
			$mykey = $ikey->Descifrar();
			
			 $sql = "SELECT * FROM productos_categorias 
				WHERE 1	".$mykey."";
			$this->Util()->DB()->setQuery($sql);
			$info = $this->Util()->DB()->GetRow();
			
			$carrito[$key]["key"] = $key;
			$carrito[$key]["nombre"] = $info["nombre"];
			$carrito[$key]["precioActual"] = $info["precioActual"];
			$carrito[$key]["cantidad"] = $aux["cantidad"];
			$carrito[$key]["productoId"] = $aux["Id"];
			$carrito[$key]["total"] = $aux["cantidad"]*$info["precioActual"];
			
			$total += $aux["cantidad"]*$info["precioActual"];
		}
		
		$data["carrito"] = $carrito;
		$data["total"] = $total;
		
		// echo "<pre>"; print_r($data);
		// exit;
		
		return $data;
		
	}
	
	public function CountCarrito(){
		
		$num =  count($_SESSION["carrito"]);
		
		return $num;
		
	}
	
	
	
	public function updateCarrito(){
		
		$ikey =  New Ikey;
		
		if(!is_array($_SESSION["carrito"]))
		$_SESSION["carrito"]=array();
		
		foreach($_SESSION["carrito"] as $key=>$aux){
			
			$_SESSION["carrito"][$key]["cantidad"] = $_POST["cantidad_".$key];
			$carrito[$key]["total"] =  $_POST["cantidad_".$key]*$info["precioActual"];
		}

		return $carrito;
		
	}
	
	public function NextPedido(){
		
		
		
		
		switch($_POST['Id']){
	
			case "1":
		// echo "<pre>"; print_r($_POST);
		// exit;
		
				$this->setCalle($_POST["calle"]);
				$this->setnumeroInterior($_POST["numInterior"]);
				$this->setnumeroExterior($_POST["numExterior"]);
				$this->setentreCalle1($_POST["entre1"]);
				$this->setentreCalle2($_POST["entre2"]);
				$this->setReferencias($_POST["referencia"]);
				$this->setCp($_POST["cp"]);
				$this->setColonia($_POST["colonia"]);
				$this->setEstadoId($_POST["estadoId"]);
				$this->setMunicipio($_POST["municipio"]);
				$this->setTelefono($_POST["telefono"]);
				
				if($this->Util()->PrintErrors()){ 
						return false; 
					}
					
					$sql = '
					INSERT INTO direcciones 
					(
						calle, 
						numeroInterior,
						numeroExterior, 
						entreCalle1,
						entreCalle2,
						referencias,
						cp,
						colonia,
						estadoId,
						municipio,
						telefono
					)
					VALUES(
						"'.$this->calle.'", 
						"'.$this->numeroInterior.'",
						"'.$this->numeroExterior.'", 
						"'.$this->entreCalle1.'",
						"'.$this->entreCalle2.'",
						"'.$this->referencias.'",
						"'.$this->cp.'",
						"'.$this->colonia.'",
						"'.$this->estadoId.'",
						"'.$this->municipio.'",
						"'.$this->telefono.'"
					)
				';
				$this->Util()->DB()->setQuery($sql);
				$Id = $this->Util()->DB()->InsertData();
				
				 $sql = '
					INSERT INTO ventas 
					(
						fecha, 
						subtotal,
						iva, 
						montoTotal,
						clienteId,
						direccionId,
						facturacionId,
						paso
					)
					VALUES(
						"'.date("Y-m-d").'", 
						"'.$subtotal.'",
						"'.$iva.'", 
						"'.$montoTotal.'",
						"'.$clienteId.'",
						"'.$Id.'",
						"0",
						"2"
						
					)
				';
				$this->Util()->DB()->setQuery($sql);
				$this->Util()->DB()->InsertData();
				
				return true;
			
			break;
			
			case 2:
			
				$this->setCalle($_POST["calleFac"]);
				$this->setnumeroInterior($_POST["numInteriorFac"]);
				$this->setnumeroExterior($_POST["numExteriorFac"]);
				$this->setCp($_POST["cpFac"]);
				$this->setColonia($_POST["coloniaFac"]);
				$this->setEstadoId($_POST["estadoIdFac"]);
				$this->setMunicipio($_POST["municipioFac"]);
				
				if($this->Util()->PrintErrors()){ 
						return false; 
					}
					
			
				 $sql = '
					INSERT INTO rfc 
					(
						razonSocial, 
						calle, 
						numeroInterior,
						numeroExterior, 
						colonia,
						municipio,
						estadoId,
						cp,
						telefono,
						correo
					)
					VALUES(
						"'.$this->nombre.'", 
						"'.$this->calle.'", 
						"'.$this->numeroInterior.'",
						"'.$this->numeroExterior.'",
						"'.$this->colonia.'",		
						"'.$this->municipio.'",		
						"'.$this->estadoId.'",		
						"'.$this->cp.'",
						"'.$this->telefono.'",
						"'.$this->correo.'"
					)
				';
				$this->Util()->DB()->setQuery($sql);
				$this->Util()->DB()->InsertData();
				
				$sql = 'UPDATE ventas SET 
				paso = 3				
				WHERE estatus = "captura"';
				$this->Util()->DB()->setQuery($sql);
				$this->Util()->DB()->UpdateData();
				
				return true;
			
			break;
		
		}
		
		
	}
	
	
	
	public function infoVenta(){
	
		$sql = 'SELECT * FROM ventas as v
		left join direcciones as d on d.direccionId = v.direccionId 
		WHERE estatus =  "captura"';

		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();
						
		return $info; 
	}
}

?>