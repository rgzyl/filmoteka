<?php 
require("../db.php");
include("../authentic.php");
$id=$_REQUEST['id'];
$query = "SELECT Tresc, recenzja.Data as Czas, IdRecenzja, Tytul, Fabula, Muzyka, Efekty, Ocena, Imie, Nazwisko FROM recenzja JOIN filmy ON filmy.IdFilmy=recenzja.IdFilmy JOIN uzytkownik ON uzytkownik.IdUzytkownik=recenzja.IdRecenzent WHERE IdRecenzja='".$id."'"; 
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
			<h3>Detal recenzji</h3>
			<p> Poniżej znajduję się tabela, w której wypisane są szczegóły recenzji dodanych przez użytkownika. </p>
			<table class="table table-bordered text-center">
				<tbody>
					<tr>
						<td width="30%"><strong>Treść:</strong></td>
						<td><?php echo $row["Tresc"]?></td>
					</tr>
					<tr>
						<td><strong>Ocena fabuły:</strong></td>
						<td><?php echo $row["Fabula"]."/10" ?></td>
					</tr>
					<tr>
						<td><strong>Ocena muzyki:</strong></td>
						<td><?php echo $row["Muzyka"]."/10" ?></td>
					</tr>
					<tr>
						<td><strong>Ocena efektów specjalnych:</strong></td>
						<td><?php echo $row["Efekty"]."/10" ?></td>
					</tr>
					<tr>
						<td><strong>Ocena ogólna:</strong></td>
						<td><?php echo $row["Ocena"]."/10" ?></td>
					</tr>
					<tr>
						<td><strong>Film:</strong></td>
						<td><?php echo $row["Tytul"] ?></td>
					</tr> 
					<tr>
						<td><strong>Recenzent:</strong></td>
						<td><?php echo $row["Imie"] . " " .$row["Nazwisko"] ?></td>
					</tr>
					<tr>
						<td><strong>Opublikowano dnia:</strong></td>
						<td><?php echo $row["Czas"] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php include("../stopka.php"); ?>
	</body>
</html>
 
