<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Partit</title>
    <link href="../../../../assets/css/main.css" rel="stylesheet" type="text/css">
</head>
<body class="vh-100 gradient-custom" >
    
</body>
</html>
<?php
#REQUIERE EL CONEXIO PHP   
require("../../../../assets/php/connexioBD.php");

$partit = $_POST['partitApostar'];
$rondesLocal = $_POST['rondesLocal'];
$rondesVisitant = $_POST['rondesVisitant'];
$update = "UPDATE TABLE 'partit' SET 'res_Local' = '$rondesLocal', 'res_Visitant' = '$rondesVisitant' WHERE 'Id_partit' = '$partit'";
/*echo $partit .",";
echo $rondesLocal .",";
echo $rondesVisitant;*/
$resultatConsulta = mysqli_query($connexio,$upadate);
   
if($resultatConsulta)
{
    echo '<script> 
    alert("Partit MODIFICAT! ");
    window.location.href="../modificarPartits.php";  </script>' ; 
}
else
{
    echo '<script> 
    alert("Partit NO modificat ");
    window.location.href="../modificarPartits.php";  </script>' ; 
}
?>