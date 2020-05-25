<?php
session_start();
if(!isset($_SESSION["IdUzytkownik"]))
{
	header("Location: ../index.php");
	exit(); 
}
?>
