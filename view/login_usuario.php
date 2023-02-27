<style>
.form {
    text-align: center;
    padding-left: 30%;
}
.error{

    color:red;
}
</style>

<div class="jumbotron text-center">
  <h1>Gestión Documental</h1>


</div>
<div class="text-center">

<?php
if (isset($_GET["response"]) and $_GET["response"] === false) {
    ?>
		<div class="error">
			Credenciales incorrectas.
		</div>
		<?php
}
if (isset($_GET["response"]) and $_GET["response"] === "unauthorized") {
    ?>
		<div class="error">
			No haz iniciado session correctamente.
		</div>
		<?php
}
?>
<form class="form" action="index.php?controller=login&action=login" method="POST">

  <div class="form-group row">

    <div class="col-sm-6">
    <input type="text" class="form-control " placeholder="Ingrese su Usuario" name="usuario"  required aria-required="true">
    </div>

  </div>
  <div class="form-group row">

    <div class="col-sm-6">
      <input type="password" name="password" class="form-control" placeholder="Password">
    </div>

  </div>

  <div class="form-group row justify-content-center">
    <div class="col-sm-6">
    <input type="submit" value="Ingresar" class="btn btn-success"/>
    </div>
  </div>

</form>
</div>


</body>