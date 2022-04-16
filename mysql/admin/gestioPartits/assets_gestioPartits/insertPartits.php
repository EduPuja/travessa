<?php
#include "../../../../assets/php/connexioBD.php";
#REQUIERE EL CONEXIO PHP   
require("../../../../assets/php/connexioBD.php");

// VARIALBES POST DEL HTML
$equipLocal = $_POST["equipLocal"];
$equipVisitant = $_POST["equipVisitant"];

$query1 = "SELECT id_Equip from equip where nom LIKE '".equipLocal."'";
$query2 = "SELECT id_Equip from equip where nom LIKE '".equipVisitant."'";

$result1 = mysqli_query($connexio,$query1);
$result2 = mysqli_query($connexio,$query2);

$rows1 = mysqli_fetch_assoc($result1);
$rows2 = mysqli_fetch_assoc($result2);

if($rows1['id_Equip'] == "Escull una opcio" && $rows2['id_Equip'] == "Escull una opcio")
{
    echo "mal";
}
else if ($rows1['id_Equip'] != $rows2['id_Equip'])
{
    $insert = "INSERT INTO partit VALUES(".$rows1['id_Equip'].",".$rows2['id_Equip'].",NULL,NULL,200);";
    $exito = mysqli_query($connexio,$insert);
    if($exito)
    {
        echo "bien";
    }
}
else  echo "mal";
/*if ()
{
    echo '<script language="javascript">alert("No pots entrar aqui");window.location.href="../../../register"</script>';
}
else
{
    

    mysqli_close($connexio);
}*/


?>