<?php
	require("../db.php");
	include("../authentic.php");
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Lista recenzji seriali i filmów</title>
		<?php include("../linki.php"); ?>
		<style>
			.img-fluid {
				height: 15px;
			}
		</style>
		<script>
			$(document).ready(function(){
			  $("#search").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#find tr").filter(function() {
				  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			  });
			});
		</script>
	</head>
	<body> 
		<?php include("../tytul.php"); ?>
		<div class="container">
			<h3> Lista recenzji</h3>
			<p> Poniżej znajduję się tabelka z wszystkim dodanymi przez użytkownika recenzjami. </p>
			<div style="float:right;" class="form-group form-inline">
				<label for="text">Wyszukaj po słowie klucz:&nbsp;</label>
				<input type="text" class="form-control" id="search" placeholder="Pogranicze w ogniu" name="search">
			</div>
			<table class="table table-bordered text-center" id="sort">
				<thead>
					<tr class="table-info">
						<th>L.p.</th>
						<th>Tytuł</th>
						<th>Ocena</th>
						<th>Detal</th>
						<th>Edytuj</th>
						<th>Usuń</th>
					</tr>
				</thead>
				<tbody id="find">
				<?php
					$count = 1;
					$recenzja = mysqli_query($con, "SELECT Tytul, IdRecenzja, ROUND((Fabula+Ocena+Muzyka+Efekty)/4,2) AS Suma FROM recenzja JOIN filmy ON filmy.IdFilmy=recenzja.IdFilmy ORDER BY Tytul ASC");
					while($row = mysqli_fetch_assoc($recenzja)) { 
				?>
					<tr>
						<td><?php echo $count; ?></td>
						<td align="center"><?php echo $row["Tytul"]; ?></td>
						<td align="center"><?php echo $row["Suma"]; ?></td>
						<td align="center"><a type="button" class="btn btn-primary" href="detal.php?id=<?php echo $row["IdRecenzja"]; ?>">Szczegóły</a></td>
						<td align="center"><a type="button" class="btn btn-success" href="edytuj.php?id=<?php echo $row["IdRecenzja"]; ?>">Aktualizuj</a></td>
						<td align="center"><a type="button" class="btn btn-danger" href="usun.php?id=<?php echo $row["IdRecenzja"]; ?>">Usuń</a></td>
					</tr>
				<?php 
					$count++; }
				?>
				</tbody>
			</table>
		</div>
		<?php include("../stopka.php"); ?>
	</body>
</html>
