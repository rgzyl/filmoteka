<?php 
require("../db.php");
include("../authentic.php");
$id=$_REQUEST['id'];
$query = "SELECT * FROM filmy JOIN rodzaj ON rodzaj.IdRodzaj = filmy.IdRodzaj JOIN gatunek ON gatunek.IdGatunek = filmy.IdGatunek JOIN rezyser ON rezyser.IdRezyser = filmy.IdRezyser JOIN audio ON audio.IdAudio = filmy.IdAudio WHERE IdFilmy='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result)
?>

<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Detal filmów i seriali</title>
		<?php include("../linki.php"); ?>
		</style>
	</head>
	<body> 
		<?php include("../tytul.php"); ?>
		<div class="container">
			<h3>Detal filmu lub serialu</h3>
			<p> Poniżej znajduję się tabela, w której wypisane są szczegóły dotyczące filmów lub seriali dodanych przez użytkownika. </p>
			<table class="table table-bordered text-center">
				<tbody>
					<tr>
						<td width="30%"><strong>Tytuł:</strong></td>
						<td><?php echo $row["Tytul"]?></td>
					</tr>
					<tr>
						<td><strong>Reżyser:</strong></td>
						<td><?php echo $row["Imie"] . " " . $row["Nazwisko"] ?></td>
					</tr>
					<tr>
						<td><strong>Gatunek:</strong></td>
						<td><?php echo $row["Gatunek"] ?></td>
					</tr>
					<tr>
						<td><strong>Rodzaj:</strong></td>
						<td><?php echo $row["Rodzaj"] ?></td>
					</tr>
					<tr>
						<td><strong>Audio:</strong></td>
						<td><?php echo $row["Audio"] ?></td>
					</tr> 
					<tr>
						<td><strong>Opublikowano dnia:</strong></td>
						<td><?php echo $row["Data"] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php include("../stopka.php"); ?>
	</body>
</html>
 
