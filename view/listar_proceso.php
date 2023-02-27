<div class="row">
	<div class="col-md-12 text-right">
		<a href="index.php?controller=proceso&action=edit" class="btn btn-outline-primary">Crear proceso</a>
		<hr/>
	</div>
	<?php
if (count($dataToView["data"]) > 0) {
    foreach ($dataToView["data"] as $proceso) {
        ?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $proceso['PRO_PREFIJO']; ?></h5>
					<div class="card-text"><?php echo ($proceso['PRO_NOMBRE']); ?></div>
					<hr class="mt-1"/>
					<a href="index.php?controller=proceso&action=edit&id=<?php echo $proceso['PRO_ID']; ?>" class="btn btn-primary">Editar</a>
					<a href="index.php?controller=proceso&action=confirmDelete&id=<?php echo $proceso['PRO_ID']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
}
} else {
    ?>
		<div class="alert alert-info">
			Actualmente no existen procesos.
		</div>
		<?php
}
?>
</div>