<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Partit</title>
    <link href="../../../../assets/css/main.css" rel="stylesheet" type="text/css">
</head>
<body class="vh-100 gradient-custom" >
    
</body>
</html>
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
    echo '<script> 
    alert("No hi ha resultats ");
    window.location.href="../crearPartits.php";  </script>' ; 
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