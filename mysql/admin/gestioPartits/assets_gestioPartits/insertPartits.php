<?php
#REQUIERE EL CONEXIO PHP   
require("../../../../assets/php/connexioBD.php");

$equipLocal = $_POST['equipLocal'];
$equipVisitant = $_POST['equipVisitant'];

    

    echo $equipLocal .",";
    echo $equipVisitant;


    





if(mysqli_num_rows($result)>0)
{
    echo " mal";
}
else
{
   
    echo " hola";

} 

?>