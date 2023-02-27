<?php
$id = $prefijo = $nombre = "";

if (isset($dataToView["data"]["TIP_ID"])) {
    $id = $dataToView["data"]["TIP_ID"];
}

if (isset($dataToView["data"]["TIP_PREFIJO"])) {
    $prefijo = $dataToView["data"]["TIP_PREFIJO"];
}

if (isset($dataToView["data"]["TIP_NOMBRE"])) {
    $nombre = $dataToView["data"]["TIP_NOMBRE"];
}

?>
<div class="row">
	<?php
if (isset($_GET["response"]) and $_GET["response"] === true) {
    ?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=tipo&action=list">Volver al listado</a>
		</div>
		<?php
}
?>
	<form class="form" action="index.php?controller=tipo&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label>Prefijo Proceso</label>
			<input class="form-control" type="text" name="prefijo" value="<?php echo $prefijo; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>Nombre Proceso</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="nombre"><?php echo $nombre; ?></textarea>
		</div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="index.php?controller=tipo&action=list">Cancelar</a>
	</form>
</div>