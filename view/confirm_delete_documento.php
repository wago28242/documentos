<div class="row">
	<form class="form" action="index.php?controller=documento&action=delete" method="POST">
		<input type="hidden" name="id" value="<?php echo $dataToView["data"]["DOC_ID"]; ?>" />
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar el documento?:</b>
			<i><?php echo $dataToView["data"]["DOC_NOMBRE"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="index.php?controller=documento&action=list">Cancelar</a>
	</form>
</div>