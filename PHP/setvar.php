<?php
session_start();
if($_POST)
{
	include("Script/LoginClass.php");
	$obj = new LoginClass();
	$obj->FacebookLogin($_POST['req'],$_POST['name']); //Method in LoginClass that set session variables

 }
   echo $_SESSION['email'];
?>
