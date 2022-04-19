<?php
session_start();


if(!isset($_SESSION['usuari']) && !isset($_SESSION['usuariAdmin']))
	{
		echo '<script> 
		alert("Necessites registrarte abans de poder entrar ");
		window.location.href="../login/";  </script>' ; 
		session_destroy();
		#header("Location ../../home.html"); 
 
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Partit</title>
    <link href="../../../../assets/css/main.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../../../../assets/img/icons/footway.ico"/>
</head>
<body class="vh-100 gradient-custom" >
    
</body>
</html>
<?php
#REQUIERE EL CONEXIO PHP   
require("../../../../assets/php/connexioBD.php");

$partit = $_POST['partit'];
$rondesLocal = $_POST['rondesLocal'];
$rondesVisitant = $_POST['rondesVisitant'];
$calersAposta = $_POST['calersAposta'];
    // variables post els imprimeixo per veure si funcionen
    /*echo $equipLocal .",";
    echo $equipVisitant;*/
#INSERT INTO partit (id_EquipLocal,id_EquipVisitant,benefici) VALUES ('3','5',2000)
#echo " hola";

$consulta = "SELECT email from usuari where nom  = $_SESSION[usuari] OR nom = $_SESSION[usuariAdmin]";
$result = mysqli_query($connexio,$consulta);
if($row = mysqli_num_rows($result)<=0)
{
    $insert = "INSERT INTO aposta (id_usuari,id_partit,res_Local,res_Visitant,dinersApostats) VALUES ('$row[email]',$partit,$rondesLocal,$rondesVisitant,$calersAposta)";
    $resultatConsulta = mysqli_query($connexio,$insert);
       
    if($resultatConsulta)
    {
        echo '<script> 
        alert("Aposta FETA! ");
        window.location.href="../../";</script>' ; 
    }
    else
    {
        echo '<script> 
        alert("Aposta NO feta...");
        window.location.href="../../";</script>' ; 
    }
}
else {
    echo '<script> 
    alert("Algo es incorrecte...");
    window.location.href="../../";</script>' ; 
}