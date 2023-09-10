<?php 
    include("Menu.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <form method="post">
    	<h1>Tabla de registro De pacientes</h1>
    	<input type="text" name="name" placeholder="Nombre completo">
    	<input type="text" name="apellido" placeholder="Apellido completo">
		<input type="text" name="cedula" placeholder="Cedula Del paciente">
		<input type="text" name="telefono" placeholder="Telefono">
		<input type="text" name="sexo" placeholder="Sexo">
		<input type="text" name="antecedentesp" placeholder="Diabetes, sida, cancer etc">
		<input type="text" name="antecedentesf" placeholder="Diabetes, sida, cancer etc">
		<input type="text" name="alergia" placeholder="Atamel, penicilina, antibioticos etc">
    	<input type="submit" name="register">
    </form>
        <?php 
        include("registrar.php");
        ?>
</body>
</html>