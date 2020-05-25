<?php
	require("db.php");
	session_start();
	if(count($_POST)>0) 
	{
		$result = mysqli_query($con,"SELECT * FROM uzytkownik WHERE Login='" . $_POST["username"] . "' and Haslo = '". $_POST["password"]."'");
		$row  = mysqli_fetch_array($result);
		if(is_array($row)) 
		{
			$_SESSION["IdUzytkownik"] = $row['IdUzytkownik'];
			$_SESSION["Imie"] = $row['Imie'];
		} else 
		{
		echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Nieprawidłowa nazwa użytkownika albo hasło. Spróbuj ponownie!</div>";
		}
	}
	if(isset($_SESSION["IdUzytkownik"])) 
	{
		header("Location:menu.php");
	}
?>
<html lang="pl">
	<head>
		<title>Zaloguj się - Filmoteka</title>
		<?php include("linki.php"); ?>
		</style>
	</head>
	<body>
		<div id="status"></div>
		<div class="container text-center">
			<h1 class="font">Filmoteka</h1>
			<p> Strona stworzona na potrzeby przedmiotu "Bazy danych" </p>
		</div>
		<br/>
		<div class="container">
			<h2>Panel logowania do serwisu</h2>
			<form action="" method="post">
				<div class="form-group">
					<label>Nazwa użytkownika:</label>
					<input type="text" class="form-control" placeholder="Podaj nazwę użytkownika" name="username">
				</div>
				<div class="form-group">
					<label>Hasło:</label>
					<input type="password" class="form-control" placeholder="Podaj hasło" name="password">
				</div>
				<button type="submit" class="btn btn-secondary">Zaloguj się</button>
			</form>
		</div>
		<?php include("stopka.php"); ?>
	</body>
</html>