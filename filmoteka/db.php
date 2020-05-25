<?php
	$con = mysqli_connect("localhost", "root", "", "32471618_filmoteka");
	
	if (!mysqli_set_charset($con, "utf8")) 
	{
		mysqli_error($con);
		exit();
	} 
	else 
	{
		mysqli_character_set_name($con);
	}
	
	if (mysqli_connect_errno())
	{
		echo "Błąd połączenia z bazą danych" . mysqli_connect_error();
	}
?>