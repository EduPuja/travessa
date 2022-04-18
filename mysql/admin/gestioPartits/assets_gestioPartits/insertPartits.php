<?php
#include "../../../../assets/php/connexioBD.php";
#REQUIERE EL CONEXIO PHP   
require("../../../../assets/php/connexioBD.php");

$equipLocal = $_POST["equipLocal"];
$equipVisitant = $_POST["equipVisitant"];

$query = "SELECT e.id_Equip as local, e1.id_Equip as visitant from equip e INNER JOIN equip e1 on e.id_equip = p.id_equiplocal INNER JOIN equip e1 on e1.id_equip = p.id_equipVisitant";
$result = mysqli_query($connexio,$query);
$row = mysqli_fetch_assoc($result)

/*if($row)
{
	echo "<tr><th class='text-center'>".$row['local']." vs ".$row['visitant']."</th><th class='text-center'> ".$row['result']." </th> <th class='text-center'><button class='btn btn-sm btn-outline-warning me-2 active' type='button'>Apostar</button></th>";
}
else
{
	echo "<tr><th class='text-center'>".$row['local']." vs ".$row['visitant']."</th><th class='text-center text-danger'> ".$row['result']." </th> <th class='text-center'></th>";
}*/

// VARIALBES POST DEL HTML


//Locals
/*$consulta1 = "SELECT id_Equip from equip where nom LIKE '".$equipLocal."'";
$query1 = mysqli_query($connexio,$consulta1);
$rows1 = mysqli_fetch_assoc($query1);

//Visitants
$consulta2 = "SELECT id_Equip from equip where nom LIKE '".$equipVisitant."'";
$query2 = mysqli_query($connexio,$consulta2);
$rows2 = mysqli_fetch_assoc($query2);

//$idLocal = $rows1['id_Equip'];
//$idVisitant = $rows2['id_Equip'];
echo "<h1>".$rows1['id_Equip'].",".$rows2['id_Equip']."</h1>";


$insert = "INSERT INTO partit ( `id_EquipLocal`,`id_EquipVisitant`,'benefici') VALUES (".$idLocal.",".$idVisitant.",400)";
$exito = mysqli_query($connexio,$insert);
if($exito)
{
    /*echo '<script> 
            Swal.fire({
                icon: "success",
                title: "OK!!",
                text: "Partit Creat Correctement.",
                confirmButtonText:
                "<i class=fa fa-thumbs-up>GO</i> " +
                "<a href=../> Gestio Partits</a> ",
            })
            </script>';*/
    //echo "bien";
//}
//else
//{
    //echo "mal";
    /*echo '<script> 
    Swal.fire({
        icon: "error",
        title: "Ups!!",
        text: "Ha agut un error.",
        confirmButtonText:
        "<i class=fa fa-thumbs-up>GO</i> " +
        "<a href=../assets_gestioPartits/insertPartits.php> Crear Partit</a> ",
    })
    </script>';*/
//}




/*if ()
{
    echo '<script language="javascript">alert("No pots entrar aqui");window.location.href="../../../register"</script>';
}
else
{
    

    mysqli_close($connexio);
}*/


?>