<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require_once("connection.php");
if(isset($_POST['submit'])){
	require("insertar.php");
	
	$objCliente=new modelo;

	$cliente_id =$_POST['cliente_id'];
	$nombre = htmlspecialchars(trim( $_POST['nombre']));
	$apellido = htmlspecialchars(trim($_POST['apellido']));
	$telefono = htmlspecialchars(trim($_POST['telefono']));
	$sexo = htmlspecialchars(trim($_POST['alternativas']));
	$ciudad = htmlspecialchars(trim($_POST['ciudad']));
	$direccion = htmlspecialchars(trim($_POST['direccion']));
	$edad = htmlspecialchars(trim($_POST['edad']));
	$mail = htmlspecialchars(trim($_POST['mail']));
	
	if ( $objCliente->actualizar(array($nombre,$apellido,$telefono,$sexo,$ciudad,$direccion,$edad,$mail),$cliente_id) == true){
		echo 'Datos guardados';
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
	if(isset($_GET['id'])){
		
		require("insertar.php");
		$objCliente=new modelo;
		
		$consulta = $objCliente->mostrar_cliente($_GET['id']);
		$cliente = mysql_fetch_array($consulta);
	?>
    
	<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar.php" onsubmit="ActualizarDatos(); return false">
    	<input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $cliente['id']?>" />
        <p>
	  <label>Nombres<br />
	  <input class="text" type="text" name="nombre" id="nombre" value="<?php echo $cliente['nombre']?>" />
	  </label>
      </p>
      
      <p>
	  <label>Apellido<br />
	  <input class="text" type="text" name="apellido" id="apellido" value="<?php echo $cliente['apellido']?>" />
	  </label>
      </p>
      
        <p>
	  <label>Telefono<br />
	  <input class="text" type="text" name="telefono" id="telefono" value="<?php echo $cliente['telefono']?>" />
	  </label>
      </p>      
	  
	  <p>
		<label>
		<input type="radio" name="alternativas" id="masculino" value="M" <?php if($cliente['sexo']=="M") echo "checked=\"checked\""?> />
		Masculino</label>
		<label>
		<input type="radio" name="alternativas" id="femenino" value="F" <?php if($cliente['sexo']=="F") echo "checked=\"checked\""?> />
		Femenino</label>
	  </p>
      <p>
		<label>Ciudad<br />
		<input class="text" type="text" name="ciudad" id="ciudad" value="<?php echo $cliente['ciudad']?>" />
		</label>
	  </p>
	  <p>
		<label>Direccion<br />
		<input class="text" type="text" name="direccion" id="direccion" value="<?php echo $cliente['direccion']?>" />
		</label>
	  </p>
      
      <p>
		<label>Edad<br />
		<input class="text" type="text" name="edad" id="edad" value="<?php echo $cliente['edad']?>" />
		</label>
	  </p>
      
       <p>
		<label>E mail<br />
		<input class="text" type="text" name="mail" id="mail" value="<?php echo $cliente['mail']?>" />
		</label>
	  </p>

	  <p>
		<input type="submit" name="submit" id="button" value="Enviar" />
		<label></label>
		<input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" />
	  </p>
	</form>
	<?php
	}
}
?>