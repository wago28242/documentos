<?php
$id = $nombre = $codigo = $contenido = $tipo = $proceso = "";

//print_r($dataToView["data"][2][0]["TIP_ID"]); 

if (isset($dataToView["data"][0]["DOC_ID"])) {
    $id = $dataToView["data"][0]["DOC_ID"];
}

if (isset($dataToView["data"][0]["DOC_NOMBRE"])) {
    $nombre = $dataToView["data"][0]["DOC_NOMBRE"];
}

if (isset($dataToView["data"][0]["DOC_CODIGO"])) {
    $codigo = $dataToView["data"][0]["DOC_CODIGO"];
}

if (isset($dataToView["data"][0]["DOC_CONTENIDO"])) {
    $contenido = $dataToView["data"][0]["DOC_CONTENIDO"];
}

if (isset($dataToView["data"][0]["DOC_ID_TIPO"])) {
    $tipo = $dataToView["data"][0]["DOC_ID_TIPO"];
}

if (isset($dataToView["data"][0]["DOC_ID_PROCESO"])) {
    $proceso = $dataToView["data"][0]["DOC_ID_PROCESO"];
}

?>
<div class="row">
	<?php

if (isset($_GET["response"]) and $_GET["response"] === true) {
    ?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=documento&action=list">Volver al listado</a>
		</div>
		<?php
}
?>
<form class="form" action="index.php?controller=documento&action=save" method="POST">
<input type="hidden" class="form-control" name="id" value="<? echo $id?>" required>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre Documento</label>
    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Codigo Documento</label>
    <input type="text" class="form-control" name="codigo" value="<?=$codigo?>" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Contenido</label>
    <textarea class="form-control" name="contenido" rows="3" required><?=$contenido?> </textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Tipo de Documento</label>

    
    <select class="form-control" name="tipo" >
        <?php
    foreach ($dataToView["data"][2] as $tipo) {
        ?>
        <option value="<?=$tipo["TIP_ID"]?>"><?=$tipo["TIP_NOMBRE"]?></option>
        <?php
    }

      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Tipo de Proceso</label>
    <select class="form-control" name="proceso" >
        <?php
    foreach ($dataToView["data"][1] as $proceso) {
        ?>
        <option value="<?=$proceso["PRO_ID"]?>"><?=$proceso["PRO_NOMBRE"]?></option>
        <?php
    }

      ?>
    </select>
  </div>
 
 
  <input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="index.php?controller=documento&action=list">Cancelar</a>
</form>
</div>