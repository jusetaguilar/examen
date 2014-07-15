<?php
require("insertar.php");

$cliente_id=$_GET['id'];
$objCliente=new modelo;
if( $objCliente->eliminar($cliente_id) == true){
	echo "Registro eliminado correctamente";
}else{
	echo "Ocurrio un error";
}
?>