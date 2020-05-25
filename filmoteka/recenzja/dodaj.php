<?php 
	require("../db.php");
?>
<?php
	session_start();
?>
<?php
	$ok = "Formularz został dodany prawidłowo.";
	$bad ="Coś poszło nie tak. Spróbuj ponownie później.";
	if(isset($_POST['submit']))
	{
		$Tresc = $_POST['Tresc'];
		$Fabula = $_POST['Fabula'];
		$Muzyka = $_POST['Muzyka'];
		$Efekty = $_POST['Efekty'];
		$Ocena = $_POST['Ocena'];
		$IdFilmy = $_POST['IdFilmy'];
		if($_SESSION["IdUzytkownik"]) {
			$IdRecenzent = $_SESSION['IdUzytkownik'];
		}
		else echo "<h1>Please login first .</h1>";
		$query=mysqli_query($con,"insert into recenzja(`Tresc`, `Fabula`, `Muzyka`, `Efekty`, `Ocena`, `IdFilmy`, `IdRecenzent`) values ('$Tresc', '$Fabula', '$Muzyka', '$Efekty', '$Ocena', '$IdFilmy', '$IdRecenzent')");  
		if($query==1)  
		{  
			echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>$ok</div>";		
		}   
		else 
		{
			echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>$bad</div>";	
		}
	}	
?>
<?php $filmy = mysqli_query($con, 'SELECT * FROM filmy'); ?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Formularz dodawania recenzji</title>
		<?php include("../linki.php"); ?>
		</style>
	</head>
	<body> 
		<div id="status"></div>
		<?php include("../tytul.php"); ?>
		<div class="container">
			<h3> Dodaj nową recenjzę: </h3>
			<hr/>
			<form action="" method="post" enctype="multipart/form-data">  
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Treść: </label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" name="Tresc" rows="4" placeholder="Film naprawdę przyzwoicie zrobiony. Bardzo dobre efekty specjalne i dobrze dobrana muzyka." required></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Ocena fabuły: </label>
					<div class="col-sm-10">
						<select class="form-control text-center" name="Fabula">
							<option value="10">10</option>
							<option value="9">9</option>
							<option value="8">8</option>
							<option value="7">7</option>
							<option value="6">6</option>
							<option value="5">5</option>
							<option value="4">4</option>
							<option value="3">3</option>
							<option value="2">2</option>
							<option value="1">1</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Ocena muzyki: </label>
					<div class="col-sm-10">
						<select class="form-control text-center" name="Muzyka">
							<option value="10">10</option>
							<option value="9">9</option>
							<option value="8">8</option>
							<option value="7">7</option>
							<option value="6">6</option>
							<option value="5">5</option>
							<option value="4">4</option>
							<option value="3">3</option>
							<option value="2">2</option>
							<option value="1">1</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Ocena efektów: </label>
					<div class="col-sm-10">
						<select class="form-control text-center" name="Efekty">
							<option value="10">10</option>
							<option value="9">9</option>
							<option value="8">8</option>
							<option value="7">7</option>
							<option value="6">6</option>
							<option value="5">5</option>
							<option value="4">4</option>
							<option value="3">3</option>
							<option value="2">2</option>
							<option value="1">1</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Ocena ogólna: </label>
					<div class="col-sm-10">
						<select class="form-control text-center" name="Ocena">
							<option value="10">10</option>
							<option value="9">9</option>
							<option value="8">8</option>
							<option value="7">7</option>
							<option value="6">6</option>
							<option value="5">5</option>
							<option value="4">4</option>
							<option value="3">3</option>
							<option value="2">2</option>
							<option value="1">1</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Film: </label>
					<div class="col-sm-10">
						<select class="form-control text-center" name="IdFilmy">
						<?php if (mysqli_num_rows($filmy) > 0) { 
							while($row = mysqli_fetch_assoc($filmy)) { 
						?>
							<option value="<?php echo $row["IdFilmy"] ?>"><?php echo $row["Tytul"] ?></option>
						<?php }} ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-secondary" id="submit" value="submit" name="submit">Dodaj</button>
					</div>
				</div>
			</form>
		</div>
		<?php include("../stopka.php"); ?>
	</body>
</html>