<?php 

include("con_db.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['cedula']) >= 1 && strlen($_POST['telefono']) >= 1 && strlen($_POST['sexo']) >= 1 && strlen($_POST['antecedentesp']) >= 1 && strlen($_POST['antecedentesf']) >= 1 && strlen($_POST['alergia']) >= 1) {
	    $name = trim($_POST['name']);
	    $apellido = trim($_POST['apellido']);
		$cedula = trim($_POST['cedula']);
		$telefono = trim($_POST['telefono']);
		$sexo = trim($_POST['sexo']);
		$antecedentesp = trim($_POST['antecedentesp']);
		$antecedentesf = trim($_POST['antecedentesf']);
		$alergia = trim($_POST['alergia']);
	    $consulta = "INSERT INTO datos(nombre, apellido, cedula, telefono, sexo, antecedentesp, antecedentesf, alergia) VALUES ('$name','$apellido','$cedula','$telefono','$sexo','$antecedentesp','$antecedentesf','$alergia')";
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Se ha registrado al paciente correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

?>