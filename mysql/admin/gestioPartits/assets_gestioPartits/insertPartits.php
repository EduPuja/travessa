<?php
#include "../../../../assets/php/connexioBD.php";
#REQUIERE EL CONEXIO PHP   
require("../../../../assets/php/connexioBD.php");

$equipLocal = $_POST["equipLocal"];
$equipVisitant = $_POST["equipVisitant"];

$result = mysqli_query($connexio,"SELECT * from partit WHERE id_EquipLocal = ".$equipLocal." AND id_EquipVisitant = ".$equipVisitant."");


if(mysqli_num_rows($result)>0)
{
    echo "mal";
}
else
{
    $insert_value = "INSERT INTO partit (id_EquipLocal,id_EquipVisitant,benefici) VALUES ('$equipLocal','$equipVisitant','200')";

    echo'<script type="text/javascript">
      alert("El Partit s ha creat correctament");
      window.location.href="menu_admin.php";
      </script>';
}
$retry_value = mysqli_query($connexio,$insert_value);
if (!$retry_value) 
{
   die('Error: ' . mysqli_error( $connexio ,$retry_value));
}

mysqli_close($connexio);


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