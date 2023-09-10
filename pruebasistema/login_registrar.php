<?php 
	include ("conexion.php");

	$nombre = $_POST["usuario"]; 
	$pass = $_POST["pass"];

	if (isset($_POST["btningresar"])) 
	{
		$query = mysqli_query($conn, "SELECT * FROM login WHERE usuario = '$nombre' AND password='$pass'");
		$nr = mysqli_num_rows($query);

		if ($nr==1) 
		{
			echo "<script> alert('bienvenido $nombre');window.location='paginainicio.php'</script>";
		}else 
		{
			echo "<script> alert('este usuario no existe');window.location='login.html'</script>";
		}
	}


	if (isset($_POST["btnregistrar"])) 
	{
		$sqlgrabar = "INSERT INTO login(usuario, password) values ('$nombre','$pass')";
		if (mysqli_query($conn,$sqlgrabar)) 
		{
			echo "<script> alert('usario registrado con exito $nombre');window.location='login.html'</script>";
		}else 
		{
			echo "error".$sql."<br>".mysqli_error($conn);
		}
	}


 ?>