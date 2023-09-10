<?php 
    include("Menu.php");
    include("con_db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['register'])){
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $cedula=$_POST['cedula'];
            $telefono=$_POST['telefono'];
            $sexo=$_POST['sexo'];
            $antecedentesp=$_POST['antecedentesp'];
            $antecedentesf=$_POST['antecedentesf'];
            $alergia=$_POST['alergia'];
            $tratamientos=$_POST["tratamiento"];


            $sql="UPDATE datos SET nombre='".$nombre."',apellido='".$apellido."',cedula='".$cedula."',
            telefono='".$telefono."',sexo='".$sexo."',antecedentesp='".$antecedentesp."',antecedentesf='".$antecedentesf."',
            alergia='".$alergia."',tratamiento='".$tratamientos."' WHERE id='".$id."'";

            $resultado=mysqli_query($conex,$sql);

            if($resultado){
                echo "<script languaje='JavaScript'>
                alert('los datos han sido actualizados');
                location.assign('index2.php');
                </script>";
                
            }else{
                echo "<script languaje='JavaScript'>
                alert('los datos no han sido actualizados');
                location.assign('index2.php');
                </script>";
            }

            mysqli_close($conex);

        }else{
            $id=$_GET['id'];
            $sql="SELECT * FROM datos where id='".$id."'";
            $resultado=mysqli_query($conex,$sql);



            $row=mysqli_fetch_assoc($resultado);
            $nombre=$row["nombre"];
            $apellido=$row["apellido"];
            $cedula=$row["cedula"];
            $telefono=$row["telefono"];
            $sexo=$row["sexo"];
            $antecedentesp=$row["antecedentesp"];
            $antecedentesf=$row["antecedentesf"];
            $alergia=$row["alergia"];
            $tratamientos=$row["tratamiento"];


            mysqli_close($conex);


        
    ?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    	<h1>Edicion</h1>
    	<input type="text" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre completo">
    	<input type="text" name="apellido" value="<?php echo $apellido; ?>" placeholder="Apellido completo">
		<input type="text" name="cedula" value="<?php echo $cedula; ?>" placeholder="Cedula Del paciente">
		<input type="text" name="telefono" value="<?php echo $telefono; ?>" placeholder="Telefono">
		<input type="text" name="sexo" value="<?php echo $sexo; ?>" placeholder="Sexo">
		<input type="text" name="antecedentesp" value="<?php echo $antecedentesp; ?>" placeholder="Diabetes, sida, cancer etc">
		<input type="text" name="antecedentesf" value="<?php echo $antecedentesf; ?>" placeholder="Diabetes, sida, cancer etc">
		<input type="text" name="alergia" value="<?php echo $alergia; ?>" placeholder="Atamel, penicilina, antibioticos etc">
        <input type="text" name="tratamiento" value="<?php echo $tratamientos; ?>" placeholder="tratamientos aplicados">
        
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <a href="index2.php"><input type="submit" name="register" value="ACTUALIZAR"></a>
    </form>
    <?php
        }
    ?>

    
</body>
</html>