<?php 
$inc = include("con_db.php");
if ($inc) {
	$consulta = "SELECT * FROM datos";
	$resultado = mysqli_query($conex,$consulta);
	if ($resultado) {
		while ($row = $resultado->fetch_array()) {
	    $id = $row['id'];
	    $nombre = $row['nombre'];
		$apellido = $row['apellido'];
	    $cedula = $row['cedula'];
		$telefono = $row['telefono'];
		$sexo = $row['sexo'];
		$antecedentesp = $row ['antecedentesp'];
		$antecedentesf = $row ['antecedentesf'];
		$alergia = $row ['alergia'];
		$tratamientos = $row ['tratamiento'];

	    ?>
			<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
      <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></th>
      <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellido</font></font></th>
      <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cedula</font></font></th>
	  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telefono</font></font></th>
      <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sexo</font></font></th>
      <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Antecedentes P</font></font></th>
      <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Antecedentes F</font></font></th>
	  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Alergia</font></font></th>
	  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tratamientos</font></font></th>

	  <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Acciones</font></font></th>
    </tr>
  </thead>
  <tbody>
    	 <tr class="table-info">
      <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $id; ?></font></font></th>
      <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $nombre; ?></font></font></td>
      <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $apellido; ?></font></font></td>
      <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $cedula; ?></font></font></td>
	  <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $telefono; ?></font></font></td>
	  <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $sexo; ?></font></font></td>
	  <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $antecedentesp; ?></font></font></td>
	  <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $antecedentesf; ?></font></font></td>
	  <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $alergia; ?></font></font></td>
	  <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $tratamientos; ?></font></font></td>

	  <td>
	  <button type="button" class="btn btn-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo "<a href='editar.php?id=".$row['id']."'>editar</a>";?></font></font></button>
	  <button type="button" class="btn btn-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo "<a href='eliminar.php?id=".$row['id']."'>eliminar</a>";?></font></font></button>
	  </td>

    </tr>
	</tbody>
</table>


	    <?php
	    }
	}
}
?>


