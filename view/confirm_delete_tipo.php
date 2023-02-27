<div class="row">
	<form class="form" action="index.php?controller=tipo&action=delete" method="POST">
		<input type="hidden" name="id" value="<?php echo $dataToView["data"]["TIP_ID"]; ?>" />
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar el tipo?:</b>
			<i><?php echo $dataToView["data"]["TIP_NOMBRE"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="index.php?controller=tipo&action=list">Cancelar</a>
	</form>
</div>