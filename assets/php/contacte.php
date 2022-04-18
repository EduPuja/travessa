<?php 
require("connexio.php");

$nom = $_POST['nom'];
$email = $_POST['email'];
$descripcio =$_POST['descripcio'];


mysqli_close($connexio);
?>
