<?php 
require("connexio.php");

$nom = $_POST['nom'];
$email = $_POST['email'];
$descripcio =$_POST['descripcio'];


$insert = "INSERT INTO contacte (nom,email,descripcio) VALUES($nom,$email,$descripcio)";

$result = mysqli_query($connexio,$insert);

if($result)
{
    echo "hola";
}
else
{
    echo "not good";
}


mysqli_close($connexio);
?>
