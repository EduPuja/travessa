<?php
require("../../../../assets/php/connexioBD.php");

$nomTeam = $_POST['nomEquip'];
$pais = $_POST['pais'];

$insert = "INSERT INTO equip (nom,pais) VALUES('$nomTeam','$pais')";

$result=mysqli_query($connexio,$insert);
if(result)
{
    echo "oka";
}
else
{
    echo "not good";
}
mysqli_close($connexio);

?>