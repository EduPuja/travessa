<?php
#REQUIERE EL CONEXIO PHP   
require("../../../../assets/php/connexioBD.php");

$equipLocal = $_POST['equipLocal'];
$equipVisitant = $_POST['equipVisitant'];

    
    // variables post els imprimeixo per veure si funcionen
    echo $equipLocal .",";
    echo $equipVisitant;


    





if(mysqli_num_rows($result)>0)
{
    echo " mal";
}
else
{
    #INSERT INTO partit (id_EquipLocal,id_EquipVisitant,benefici) VALUES ('3','5',2000)
    #echo " hola";
    $insert = "INSERT INTO partit (id_EquipLocal,id_EquipVisitant,benefici) VALUES ($equipLocal,$equipVisitant,2000);";
    $resultatConsulta = mysqli_query($connexio,$insert);
   
    if($resultatConsulta)
    {
        echo '<script> 
        alert("Partit CREAT! ");
        window.location.href="../crearPartits.php";  </script>' ; 
    }
    else
    {
        echo '<script> 
        alert("Partit NO creat ");
        window.location.href="../crearPartits.php";  </script>' ; 
    }

} 

?>