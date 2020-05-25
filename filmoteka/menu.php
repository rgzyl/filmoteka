<?php
require("db.php");
include("auth.php");
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Strona główna - Filmoteka</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<style>
			body { 
				margin:50px; 
				background-color: rgb(245, 250, 253);
			}
			.container {
				background-color: white;
				padding:25px;
			}
			.font {
				font-family: 'Caveat', cursive;
				font-size: 80px;
			}
		</style>
	</head>
	<body> 
		<div id="status"></div>
		<div class="container text-center">
			<h1 class="font">Filmoteka</h1>
			<a href="wyloguj.php"><strong>Wyloguj się</strong></a>
		</div>
		<br/>
		<div class="container">	
			<h2 class="text-center mt-3 mb-3">Wybierz, co chcesz zrobić:</h2>
			<br/>
			<div class="card-deck align-item-center justify-content-center">
				<a href="recenzja/dodaj.php">
				<div class="card" style="width:380px; height:150px;">
					<div class="card-body">
						<img src="img/review.png" class="img-fluid mx-auto d-block">
						<h3 class="card-title text-center">Dodaj recenzję</h3>
					</div>
				</div>
				</a>
				<a href="recenzja/wyswietl.php">
				<div class="card" style="width:380px; height:150px;">
					<div class="card-body">
						<img src="img/review_all.png" class="img-fluid mx-auto d-block">
						<h3 class="card-title text-center">Wyświetl recenzję</h3>
					</div>
				</div>
				</a>
			</div>
			<br/>
			<div class="card-deck align-item-center justify-content-center">
				<a href="filmy/dodaj.php">
				<div class="card" style="width:380px; height:150px;">
					<div class="card-body">
						<img src="img/film.png" class="img-fluid mx-auto d-block">
						<h3 class="card-title text-center">Dodaj nowy film/serial</h3>
					</div>
				</div>
				</a>
				<a href="filmy/wyswietl.php">
				<div class="card" style="width:380px; height:150px;">
					<div class="card-body">
						<img src="img/film_all.png" class="img-fluid mx-auto d-block">
						<h3 class="card-title text-center">Wyświetl filmy i seriale</h3>
					</div>
				</div>
				</a>
			</div>
		</div>
		<?php include("stopka.php"); ?>
	</body>
</html>