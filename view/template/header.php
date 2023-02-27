<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<?php
if(isset($_SESSION["authorized"]) && $_SESSION["authorized"] == 1){
	
	?>
	<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" >Gestión Documental</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?controller=menu&action=index">Menú<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?controller=login&action=logout">Logout</a>
      </li>
      
    </ul>
  </div>
</nav>
		<?php


	}

if ($controller->page_title != "") {
    ?>
	<div class="container">
		<header class="mb-5">
			<div class="p-5 text-center bg-light" style="margin-top: 58px;">

				<h1 class="mb-3"><?php echo $controller->page_title; ?></h1>
				<h4 class="mb-3">-</h4>

			</div>
		</header>
		<?php
}


?>

