<?php
    $id=$_GET['id'];
    include("con_db.php");

    $sql="DELETE FROM datos WHERE id='".$id."'";
    $resultado=mysqli_query($conex, $sql);

    if ($resultado){
        echo "<script languaje='JavaScript'>
        alert('los datos han sido eliminados');
        location.assign('index2.php');
        </script>";
    }else{
        echo "<script languaje='JavaScript'>
        alert('los datos no han sido eliminados');
        location.assign('index2.php');
        </script>";
    }
?>