<?php
	require("../db.php");
	$id=$_REQUEST['id'];
	$result = mysqli_query($con, "DELETE FROM filmy WHERE IdFilmy='".$id."'") or die ( mysqli_error());
	header("Location: wyswietl.php"); 
?>