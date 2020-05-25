<?php
	require("../db.php");
	include("../authentic.php");
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Lista seriali i filmów</title>
		<?php include("../linki.php"); ?>
		</style>
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
			<h3> Lista filmów i seriali</h3>
			<p> Poniżej znajduję się tabelka z wszystkim dodanymi przez użytkownika filmami oraz serialami. </p>
			<div style="float:right;" class="form-group form-inline">
				<label for="text">Wyszukaj po słowie klucz:&nbsp;</label>
				<input type="text" class="form-control" id="search" placeholder="Pogranicze w ogniu" name="search">
			</div>
			<table class="table table-bordered text-center">
				<thead>
					<tr class="table-info">
						<th>L.p.</th>
						<th>Tytuł</th>
						<th>Gatunek</th>
						<th>Detal</th>
						<th>Edytuj</th>
						<th>Usuń</th>
					</tr>
				</thead>
				<tbody id="find">
				<?php
					$count = 1;
					$filmy = mysqli_query($con, "SELECT * FROM filmy JOIN gatunek ON gatunek.IdGatunek=filmy.IdGatunek");
					while($row = mysqli_fetch_assoc($filmy)) { 
				?>
					<tr>
						<td><?php echo $count; ?></td>
						<td align="center"><?php echo $row["Tytul"]; ?></td>
						<td align="center"><?php echo $row["Gatunek"]; ?></td>
						<td align="center"><a type="button" class="btn btn-primary" href="detal.php?id=<?php echo $row["IdFilmy"]; ?>">Szczegóły</a></td>
						<td align="center"><a type="button" class="btn btn-success" href="edytuj.php?id=<?php echo $row["IdFilmy"]; ?>">Aktualizuj</a></td>
						<td align="center"><a type="button" class="btn btn-danger" href="usun.php?id=<?php echo $row["IdFilmy"]; ?>">Usuń</a></td>
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
