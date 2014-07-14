<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require("insertar.php");

$new = new modelo;



if ( isset ($_POST['submit'])){
	
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$sexo = $_POST['sexo'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$edad = $_POST['edad'];
$mail = $_POST['mail'];
	
	if( $new->insert(array($nombre, $apellido, $telefono, $sexo, $ciudad, $direccion, $edad, $mail) ) == true){
		echo "los datos c insertaron";
		
	}else{
		echo "los datos no c insertaron";
			
	}
	
}else{
	
?>	
	
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<form id="formexamen" name="formexamen" method="post" action="index.php">

  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" /><br />
  
   <label for="apellido">Apellido</label>
  <input type="text" name="apellido" id="apellido" /><br />
  
   <label for="telefono">Telefono</label>
  <input type="text" name="telefono" id="telefono" /><br />  
   
  <label for="sexo">sexo</label>
  <select name="sexo" id="sexo">
    <option value="m">M</option>
    <option value="f">F</option>
  </select><br />
  
  <label for="ciudad">Ciudad</label>
  <input type="text" name="ciudad" id="ciudad" /><br />
  
    
  <label for="direccion">Direccion</label>
  <input type="text" name="direccion" id="direccion" /><br />
  
   <label for="edad">Edad</label>
  <input type="text" name="edad" id="edad" /><br />
  
   <label for="mail">Email</label>
  <input type="text" name="mail" id="mail" /><br />
  
<input name="submit" type="submit" value="Enviar" />
</form>

<h1>Usuarios Registrados</h1>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th bgcolor="#CCCCCC" scope="row"><strong>Id</strong></th>
    <th bgcolor="#CCCCCC"><strong>Nombre</strong></th>
    <th bgcolor="#CCCCCC"><strong>Apellido</strong></th>
    <th bgcolor="#CCCCCC"><strong>Telefono</strong></th>
    <th bgcolor="#CCCCCC"><strong>Sexo</strong></th>
    <th bgcolor="#CCCCCC"><strong>Ciudad</strong></th>
    <th bgcolor="#CCCCCC"><strong>Direccion</strong></th>
    <th bgcolor="#CCCCCC"><strong>Edad</strong></th>
     <th bgcolor="#CCCCCC"><strong>Email</strong></th>
    <th bgcolor="#CCCCCC"><strong>Modificar</strong></th>
    <th bgcolor="#CCCCCC"><strong>Eliminar</strong></th>
  </tr>
  
  <?php
  $ident=$new->consultar();
  while( $consul=mysql_fetch_array($ident)){   
  ?>
  
  <tr>
    <th scope="row"><?php echo $consul["id"]?></th>
    <td><?php echo $consul["nombre"]?></td>
    <td><?php echo $consul["apellido"]?></td>
    <td><?php echo $consul["telefono"]?></td>
    <td><?php echo $consul["sexo"]?></td>
    <td><?php echo $consul["ciudad"]?></td>
    <td><?php echo $consul["direccion"]?></td>
    <td><?php echo $consul["edad"]?></td>
    <td><?php echo $consul["mail"]?></td>
    <td><a href="actualizar.php?id=<?php echo  $consul["id"] ?>">Modificar</a></td>
    <td><a href="eliminar.php?id=<?php echo  $consul["id"] ?>">eliminar</a></td>
  </tr>
  <?php
  }
  ?>
</table>

</body>
</html>
	
	

<?php
}
?>