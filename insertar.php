<?php

require_once("connection.php");

class modelo{
	var $conectarnew;
	
	function modelo (){			
		$this->conectarnew = new conexion;		
	}
	
	function insert ($campos){
	if(	$this->conectarnew->conetc() == true ){
		
		return mysql_query("insert into candidates (nombre,apellido,telefono,sexo,ciudad,direccion,edad,mail) VALUES ( '".$campos[0] ."','".$campos[1] ."','".$campos[2] ."','".$campos[3] ."','".$campos[4] ."','".$campos[5] ."','".$campos[6] ."','".$campos[7] ."')");		
	
	}
		
	}
	
	function consultar (){
		if($this->conectarnew->conetc() == true){
			return mysql_query(" select * from candidates");			
			
		}		
		
	}
	
}



?>
