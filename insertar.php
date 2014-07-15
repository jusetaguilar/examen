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
	
	function actualizar ($campos,$id){
		if($this->conectarnew->conetc() == true){
			
			return mysql_query(" UPDATE candidates SET  nombre = '".$campos[0]."', apellido = '".$campos[1]."', telefono = '".$campos[2]."', sexo ='".$campos[3]."' , ciudad = '".$campos[4]."', direccion = '".$campos[5]."', edad = '".$campos[6]."', mail = '".$campos[7]."' WHERE  id = ".$id );
			
		}
		
		
	}
	
	function eliminar ($id){
		if( $this->conectarnew->conetc() == true){			
			return mysql_query(" DELETE from candidates WHERE id = " .$id );			
		}
		
		
	}
	
	function mostrar_cliente($id){
		if($this->conectarnew->conetc()== true){			
			return mysql_query("SELECT * FROM candidates WHERE id=".$id);			
		}		
		
	}
		
}



?>
