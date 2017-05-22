<?php 
class Role extends Main
{
    protected $permissions;
    private  $name_role;
    private  $id;

    public function setId($value){
		$this->Util()->ValidateInteger($value);
		$this->id = $value;
	}
	public function setNombre($value){
		if($this->Util()->ValidateRequireField($value, 'Nombre rol')){
			$this->Util()->ValidateString($value, 100, 0, '');
			$this->nombre = $value;
		}
	}
	public function Info(){
		$sql = 'SELECT * FROM roles WHERE ID = "'.$this->id.'"';
		$this->Util()->DB()->setQuery($sql);
		$info = $this->Util()->DB()->GetRow();	
		return $info;
	}
    // Crea un objeto role que esta asociado con permisos
     public function Save(){
						
		if($this->Util()->PrintErrors()){ 
			return false; 
		}
		$sql = "
		INSERT INTO  roles(
				`role_name`,
				usuario_creacion,
				fecha_creacion 
				)
				VALUES (
				'".$this->nombre."',
				'".$_SESSION['Usr']['usuario']."',
				'".date('Y-m-d')."'
				);
		";
		$this->Util()->DB()->setQuery($sql);
		$this->Util()->DB()->InsertData();
			
		$this->Util()->setError(10129, 'complete', '');
		$this->Util()->PrintErrors();
		return true;	
	}//Save
	public function getListRoles(){
		
		$sql = 'SELECT * FROM roles ORDER BY Title DESC
				';
		$this->Util()->DB()->setQuery($sql);
		$data = $this->Util()->DB()->GetResult();	
		return $data;
		
	}//Enumerate
	public function Enumerate(){
		$sql = 'SELECT 
				*
				FROM roles  where ID>1
				ORDER BY Title DESC
				';
		$this->Util()->DB()->setQuery($sql);
		$data = $this->Util()->DB()->GetResult();
		
	
					
		return $data;
		
	}//Enumerate
	
	public function getPermisosRoles($rq=array(),$rolId) 
    {
      $new_array = array();
      $array_perm =  array();

      $sql =  "SELECT PermissionID from rolepermissions where RoleID=".$rolId;
      $this->Util()->DB()->setQuery($sql);
      $array_perm = $this->Util()->DB()->GetResultField("PermissionID"); 
    
      foreach($rq as $key => $value)
      {
       	$car =  $value;
       	if(in_array($value['ID'],$array_perm))
          $car["add"] =  true;
       	else
       	  $car["add"] =  false;

       	$new_array[] = $car;
      }
     return $new_array;
    }

}
?>