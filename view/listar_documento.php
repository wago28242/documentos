<div class="row">
	<div class="col-md-12 text-right">
		<a href="index.php?controller=documento&action=edit" class="btn btn-outline-primary">Crear documento</a>
		<hr/>
	</div>


<table class="table">
 <thead class="thead-dark">
    <tr>
     
      <th scope="col">NOMBRE</th>
      <th scope="col">CODIGO</th>
      <th scope="col">CONTENIDO</th>
      <th scope="col">TIPO</th>
      <th scope="col">PROCESO</th>
      <th scope="col">EDITAR</th>
      <th scope="col">ELIMINAR</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
        if (count($dataToView["data"]) > 0) {
            foreach ($dataToView["data"] as $documento) {
  ?>
    <tr>
      
     
      <td><?php echo $documento['DOC_NOMBRE']; ?></td>
      <td><?php echo $documento['DOC_CODIGO']; ?></td>
      <td><?php echo $documento['DOC_CONTENIDO']; ?></td>
      <td><?php echo $documento['DOC_ID_TIPO']; ?></td>
      <td><?php echo $documento['DOC_ID_PROCESO']; ?></td>
      <td><a href="index.php?controller=documento&action=edit&id=<?php echo $documento['DOC_ID']; ?>" class="btn btn-primary">Editar</a></td>
      <td><a href="index.php?controller=documento&action=confirmDelete&id=<?php echo $documento['DOC_ID']; ?>" class="btn btn-danger">Eliminar</a></td>
    </tr>
    <?php
    }
    } 
    else {
    ?>
		<div class="alert alert-info">
			Actualmente no existen documentos.
		</div>
		<?php
    }
    ?>
  </tbody>
</table>

</div>