<?php

$servername = "localhost";
$dbUser = "admin";
$dbPassword = "Dam2022!";
$dbName = "travessa";

$connection = mysqli_connect($servername, $dbUser, $dbPassword, $dbName);

if(!$connection)
{
	die("Error connection " . mysqli_connect_error());
}