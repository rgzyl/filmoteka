<?php  
	require("../db.php");
	include("../authentic.php");
?>
<?php
	$ok = "Formularz został dodany prawidłowo.";
	$bad ="Coś poszło nie tak. Spróbuj ponownie później.";
	if(isset($_POST['submit']))  
	{  
		$Tytul = $_POST['Tytul'];
		$IdRodzaj = $_POST['IdRodzaj'];
		$IdGatunek = $_POST['IdGatunek'];
		$IdRezyser = $_POST['IdRezyser'];
		$IdAudio = $_POST['IdAudio'];
		$query=mysqli_query($con,"insert into filmy(`Tytul`, `IdRodzaj`, `IdGatunek`, `IdRezyser`, `IdAudio`) values ('$Tytul', '$IdRodzaj', '$IdGatunek', '$IdRezyser', '$IdAudio')");  
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
<?php	
	$audio = mysqli_query($con, "select * from audio order by Audio asc;");
	$rezyser = mysqli_query($con, "select * from rezyser order by Nazwisko asc;");
	$gatunek = mysqli_query($con, "select * from gatunek order by Gatunek asc;");
	$rodzaj = mysqli_query($con, "select * from rodzaj order by Rodzaj asc;");
?> 
<?php
	$ok1 = "Rodzaj został dodany, odśwież stronę by pojawiła się w formularzu.";
	$bad1 ="Coś poszło nie tak. Spróbuj ponownie później.";
	if(isset($_POST['sub']))
	{
		$Rodzaj = $_POST['Rodzaj'];
		$query=mysqli_query($con,"insert into rodzaj(`Rodzaj`) values ('$Rodzaj')");  
		if($query==1)  
		{  
			echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>$ok1</div>";		
		}   
		else 
		{
			echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>$bad1</div>";	
		}
	}	
?> 
<?php
	$ok2 = "Scieżka dźwięku została dodana, odśwież stronę by pojawiła się w formularzu.";
	$bad2 ="Coś poszło nie tak. Spróbuj ponownie później.";
	if(isset($_POST['subbb']))
	{
		$Audio = $_POST['Audio'];
		$query=mysqli_query($con,"insert into audio(`Audio`) values ('$Audio')");  
		if($query==1)  
		{  
			echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>$ok2</div>";		
		}   
		else 
		{
			echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>$bad2</div>";	
		}
	}	
?>
<?php
	$ok3 = "Gatunek został dodany, odśwież stronę by pojawiła się w formularzu.";
	$bad3 ="Coś poszło nie tak. Spróbuj ponownie później.";
	if(isset($_POST['subb']))
	{
		$Gatunek = $_POST['Gatunek'];
		$query=mysqli_query($con,"insert into gatunek(`Gatunek`) values ('$Gatunek')");  
		if($query==1)  
		{  
			echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>$ok3</div>";		
		}   
		else 
		{
			echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>$bad3</div>";	
		}
	}	
?> 
<?php
	$ok4 = "Reżyser został dodany, odśwież stronę by pojawiła się w formularzu.";
	$bad4 ="Coś poszło nie tak. Spróbuj ponownie później.";
	if(isset($_POST['submitt']))
	{
		$Imie = $_POST['Imie'];
		$Nazwisko = $_POST['Nazwisko'];
		$query=mysqli_query($con,"insert into rezyser(`Imie`, `Nazwisko`) values ('$Imie', '$Nazwisko')");  
		if($query==1)  
		{  
			echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>$ok4</div>";		
		}   
		else 
		{
			echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>$bad4</div>";	
		}
	}	
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
			<h3> Dodaj nowy film lub serial: </h3>
			<hr/>
			<form action="" method="post" enctype="multipart/form-data">  
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tytuł: </label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="Tytul" placeholder="Europa, Europa" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Reżyser: </label>
					<div class="col-sm-9">
						<select class="form-control" name="IdRezyser">
						<?php if (mysqli_num_rows($rezyser) > 0) { 
							while($row = mysqli_fetch_assoc($rezyser)) { 
						?>
							<option value="<?php echo $row["IdRezyser"] ?>"><?php echo $row["Imie"] ." ". $row["Nazwisko"] ?></option>
						<?php }} ?>
						</select>
					</div>
					<div class="col-sm-1">
						<a data-toggle="modal" data-target="#rezyser""><img class="img-fluid hover" src="../img/add.png"/></a>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Audio: </label>
					<div class="col-sm-9">
						<select class="form-control" name="IdAudio" >
						<?php if (mysqli_num_rows($audio) > 0) { 
							while($row = mysqli_fetch_assoc($audio)) { 
						?>
							<option value="<?php echo $row["IdAudio"] ?>"><?php echo $row["Audio"] ?></option>
						<?php }} ?>
						</select>
					</div>
					<div class="col-sm-1">
						<a data-toggle="modal" data-target="#audio""><img class="img-fluid hover" src="../img/add.png"/></a>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Gatunek: </label>
					<div class="col-sm-9">
						<select class="form-control" name="IdGatunek">
						<?php if (mysqli_num_rows($gatunek) > 0) { 
							while($row = mysqli_fetch_assoc($gatunek)) { 
						?>
							<option value="<?php echo $row["IdGatunek"] ?>"><?php echo $row["Gatunek"] ?></option> 
						<?php }} ?>
						</select>
					</div>
					<div class="col-sm-1">
						<a data-toggle="modal" data-target="#gatunek""><img class="img-fluid hover" src="../img/add.png"/></a>
					</div>
				</div>	
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Rodzaj: </label>
					<div class="col-sm-9">
						<select class="form-control" name="IdRodzaj">
						<?php if (mysqli_num_rows($rodzaj) > 0) { 
							while($row = mysqli_fetch_assoc($rodzaj)) { 
						?>
							<option value="<?php echo $row["IdRodzaj"] ?>"><?php echo $row["Rodzaj"] ?></option>
						<?php }} ?>
						</select>
					</div>	
					<div class="col-sm-1">
						<a data-toggle="modal" data-target="#rodzaj""><img class="img-fluid hover" src="../img/add.png"/></a>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-secondary" id="submit" value="submit" name="submit">Dodaj</button>
					</div>
				</div>
			</form>
			<!-- Rodzaj -->
			<div class="modal" id="rodzaj">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form action="" method="post" enctype="multipart/form-data">  
							<div class="modal-header">
								<h4 class="modal-title">Dodaj rodzaj:</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Rodzaj: </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="Rodzaj" placeholder="Film" required>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-success" id="submit" value="submit" name="sub">Dodaj</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
							</div>
						</form>
					</div>
				</div>
			</div>	
			<!-- koniec -->	
			<!-- Audio -->
			<div class="modal" id="audio">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form action="" method="post" enctype="multipart/form-data">  
							<div class="modal-header">
								<h4 class="modal-title">Dodaj rodzaj dźwięku:</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Audio: </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="Audio" placeholder="Lektor" required>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-success" id="submit" value="submit" name="subbb">Dodaj</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
							</div>
						</form>
					</div>
				</div>
			</div>	
			<!-- koniec -->		
			<!-- Gatunek -->
			<div class="modal" id="gatunek">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form action="" method="post" enctype="multipart/form-data">  
							<div class="modal-header">
								<h4 class="modal-title">Dodaj nowy gatunek:</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Gatunek: </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="Gatunek" placeholder="Dramat" required>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-success" id="submit" value="submit" name="subb">Dodaj</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
							</div>
						</form>
					</div>
				</div>
			</div>	
			<!-- koniec -->	
			<!-- Rezyser -->
			<div class="modal" id="rezyser">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form action="" method="post" enctype="multipart/form-data">  
							<div class="modal-header">
								<h4 class="modal-title">Dodaj nowego reżysera:</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Imię: </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="Imie" placeholder="Jan" required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nazwisko: </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="Nazwisko" placeholder="Kowalski" required>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-success" id="submit" value="submit" name="submitt">Dodaj</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Zamknij</button>
							</div>
						</form>
					</div>
				</div>
			</div>	
			<!-- koniec -->	
		</div>
		<?php include("../stopka.php"); ?>
	</body>
</html>