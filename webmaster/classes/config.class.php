<?php

class Config extends Main
{
	private $id;
	

	public function setId($value){
		$this->Util()->ValidateInteger($value);
		$this->id = $value;
	}
	
	//Ontener datos y listados
	public function Info(){
		$sql = 'SELECT * FROM permissions WHERE ID = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();		
		return $info;
	}
	public function EnumerateAll(){
		$sql = 'SELECT * FROM catalogo_tramites WHERE 1';
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetResult();
		return $info;
	}
	
	public function getListPermisos(){
				 
		$sql = 'SELECT 
				*
				FROM permissions where ID >1
				ORDER BY Description DESC
				';
		$this->Util()->DB()->setQuery($sql);
		$data= $this->Util()->DB()->GetResult();
		

					
		return $data;
		
	}//Enumerate

	public function getOnlyColumnArray($temp=array(),$field){
      $newarray =  array();
      foreach($temp as $key =>$value)
      	  $newarray[] = $value[$field];

      	return $newarray;
	}
	
}

?>