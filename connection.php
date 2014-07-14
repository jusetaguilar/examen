<?php

class conexion{
	var $conet;
					
	var $basedatos;
	var $server;
	var $user;
	var $pasword;
	
	function conexion() {
		$this->basedatos = "examen";
		$this->server = "localhost";
		$this->user = "root";
		$this->pasword = "galileo2012";	
	}
	
	function conetc (){
		
		if ( ! ($conexion=mysql_connect($this->server,$this->user,$this->pasword))){
		  	echo ("error");
			exit;
		}
		
		if ( ! (mysql_select_db ($this->basedatos, $conexion))){
			echo ("error db");
			exit;
		
		}
		
		$this->conet=$conexion;
		
		return true;
		
		
	}
			
}







?>