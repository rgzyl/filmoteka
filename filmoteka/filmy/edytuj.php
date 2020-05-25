<?php 
	require("../db.php");
	include("../authentic.php");
	$id=$_REQUEST['id'];
	$query = "SELECT * FROM filmy WHERE IdFilmy='".$id."'"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Formularz aktualizowania filmów lub seriali</title>
		<meta charset="utf-8">
		<?php include("../linki.php"); ?>
		</style>
	</head>
	<body> 
		<div id="status"></div>
		<?php include("../tytul.php"); ?>
		<div class="container">
			<?php
				$audio = mysqli_query($con, "SELECT * FROM audio");
				$rezyser = mysqli_query($con, "SELECT * FROM rezyser");
				$rodzaj = mysqli_query($con, "SELECT * FROM rodzaj");
				$gatunek = mysqli_query($con, "SELECT * FROM gatunek");
				if(isset($_POST['submit']))
				{
					$IdFilmy=$_REQUEST['IdFilmy'];
					$Tytul =$_REQUEST['Tytul'];
					$IdAudio =$_REQUEST['IdAudio'];
					$IdGatunek =$_REQUEST['IdGatunek'];
					$IdRezyser =$_REQUEST['IdRezyser'];
					$IdRodzaj =$_REQUEST['IdRodzaj'];
					$update="update filmy set Tytul='".$Tytul."', IdAudio='".$IdAudio."', IdRezyser='".$IdRezyser."', IdRodzaj='".$IdRodzaj."', IdGatunek='".$IdGatunek."' where IdFilmy='".$IdFilmy."'";
					mysqli_query($con, $update) or die(mysqli_error());
					header("Location: wyswietl.php");
				} else {
			?>
			<h3> Aktualziuj film lub serial: </h3>
			<hr/>
			<form action="" method="post" enctype="multipart/form-data">  
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tytuł: </label>
					<div class="col-sm-10">
						<input name="IdFilmy" type="hidden" value="<?php echo $row['IdFilmy'];?>" />
						<input type="text" class="form-control" name="Tytul" value="<?php echo $row['Tytul'];?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Reżyser: </label>
					<div class="col-sm-10">
						<select class="form-control" name="IdRezyser">
						<?php if (mysqli_num_rows($rezyser) > 0) { 
							while($row = mysqli_fetch_assoc($rezyser)) { 
						?>
							<option value="<?php echo $row["IdRezyser"] ?>"><?php echo $row["Imie"] . " " . $row["Nazwisko"] ?></option>
						<?php }} ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Rodzaj: </label>
					<div class="col-sm-10">
						<select class="form-control" name="IdRodzaj">
						<?php if (mysqli_num_rows($rodzaj) > 0) { 
							while($row = mysqli_fetch_assoc($rodzaj)) { 
						?>
							<option value="<?php echo $row["IdRodzaj"] ?>"><?php echo $row["Rodzaj"] ?></option>
						<?php }} ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Gatunek: </label>
					<div class="col-sm-10">
						<select class="form-control" name="IdGatunek">
						<?php if (mysqli_num_rows($gatunek) > 0) { 
							while($row = mysqli_fetch_assoc($gatunek)) { 
						?>
							<option value="<?php echo $row["IdGatunek"] ?>"><?php echo $row["Gatunek"] ?></option>
						<?php }} ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Audio: </label>
					<div class="col-sm-10">
						<select class="form-control" name="IdAudio">
						<?php if (mysqli_num_rows($audio) > 0) { 
							while($row = mysqli_fetch_assoc($audio)) { 
						?>
							<option value="<?php echo $row["IdAudio"] ?>"><?php echo $row["Audio"] ?></option>
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
