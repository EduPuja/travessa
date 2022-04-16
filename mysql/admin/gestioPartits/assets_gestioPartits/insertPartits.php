<?php
#include "../../../../assets/php/connexioBD.php";
#REQUIERE EL CONEXIO PHP   
require("../../../../assets/php/connexioBD.php");

// VARIALBES POST DEL HTML
$equipLocal = $_POST["equipLocal"];
$equipVisitant = $_POST["equipVisitant"];

$query = "SELECT e.nom as local, e1.nom as visitant, 
          CASE WHEN res_Local IS NULL and res_Visitant IS NULL THEN 'Activada' 
          WHEN res_Local IS NOT NULL and res_Visitant IS NOT NULL THEN 'Desactivada' 
          END AS result 
          from equip e 
          INNER JOIN partit p on e.id_equip = p.id_equiplocal 
          INNER JOIN equip e1 on e1.id_equip = p.id_equipVisitant";
$query = "SELECT e.id_equip as local, e1.id_equip as visitant
          WHERE ".$equipLocal." EXIST(SELECT  from equip where nom)";
				$result = mysqli_query($connexio,$query);
/*if ()
{
    echo '<script language="javascript">alert("No pots entrar aqui");window.location.href="../../../register"</script>';
}
else
{
    

    mysqli_close($connexio);
}*/


?>