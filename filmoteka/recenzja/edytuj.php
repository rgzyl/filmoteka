<?php 
	require("../db.php");
	include("../authentic.php");
	$id=$_REQUEST['id'];
	$query = "SELECT * FROM recenzja WHERE IdRecenzja='".$id."'"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Formularz dodawania filmów lub seriali</title>
		<?php include("../linki.php"); ?>
		</style>
	</head>
	<body> 
		<div id="status"></div>
		<?php include("../tytul.php"); ?>
		<div class="container">
			<?php
				$filmy = mysqli_query($con, "SELECT * FROM filmy");
				if(isset($_POST['submit']))
				{
					$IdFilmy=$_REQUEST['IdFilmy'];
					$IdRecenzja =$_REQUEST['IdRecenzja'];
					$Tresc =$_REQUEST['Tresc'];
					$Fabula =$_REQUEST['Fabula'];
					$Muzyka =$_REQUEST['Muzyka'];
					$Efekty =$_REQUEST['Efekty'];
					$Ocena =$_REQUEST['Ocena'];
					$Recenzent =$_REQUEST['Recenzent'];
					$update="update recenzja set Tresc='".$Tresc."', Ocena='".$Ocena."', IdFilmy='".$IdFilmy."', Fabula='".$Fabula."', Muzyka='".$Muzyka."', Efekty='".$Efekty."' where IdRecenzja='".$IdRecenzja."'";
					mysqli_query($con, $update) or die(mysqli_error());
					header("Location: wyswietl.php");
				} else {
			?>
			<h3> Aktualziuj film lub serial: </h3>
			<hr/>
			<form action="" method="post" enctype="multipart/form-data">  
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Treść: </label>
					<div class="col-sm-10">
						<input name="IdRecenzja" type="hidden" value="<?php echo $row['IdRecenzja'];?>" />
						<textarea type="text" rows="4" class="form-control" name="Tresc"required><?php echo $row['Tresc'];?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Ocena fabuły: </label>
					<div class="col-sm-10">
						<select class="form-control text-center" name="Fabula">
							<option value="<?php echo $row["Fabula"] ?>"><?php echo $row["Fabula"] ?></option>
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
							<option value="<?php echo $row["Muzyka"] ?>"><?php echo $row["Muzyka"] ?></option>
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
							<option value="<?php echo $row["Efekty"] ?>"><?php echo $row["Efekty"] ?></option>
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
							<option value="<?php echo $row["Ocena"] ?>"><?php echo $row["Ocena"] ?></option>
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
						<button type="submit" class="btn btn-secondary" id="submit" value="update" name="submit">Zaktualizuj</button>
					</div>
				</div>
			</form>
			<?php } ?>
		</div>
		<?php include("../stopka.php"); ?>
	</body>
</html>
