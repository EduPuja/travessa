<?php
session_start();


if(!isset($_SESSION['usuariAdmin']))
{
		echo '<script> 
		alert("No ets administrador");
		window.location.href="../../login/";  </script>' ; 
		session_destroy();
		#header("Location ../../home.html"); 
 
}
#REQUIERE EL CONEXIO PHP   
require("../../../assets/php/connexioBD.php");

$partit = $_POST['partit'];
$rondesLocal = $_POST['rondesLocal'];
$rondesVisitant = $_POST['rondesVisitant'];
$calersAposta = $_POST['calersAposta'];
    // variables post els imprimeixo per veure si funcionen
    /*echo $equipLocal .",";
    echo $equipVisitant;*/
#INSERT INTO partit (id_EquipLocal,id_EquipVisitant,benefici) VALUES ('3','5',2000)
#echo " hola";
/*echo $_SESSION['usuariAdmin'] .",";
echo $partit.",";
echo $rondesLocal.",";
echo $rondesVisitant.",";
echo $calersAposta;*/
$insert = "INSERT INTO aposta (id_usuari,id_partit,res_Local,res_Visitant,dinersApostats) VALUES ('$_SESSION[usuariAdmin]',$partit,$rondesLocal,$rondesVisitant,$calersAposta)";
$resultatConsulta = mysqli_query($connexio,$insert);
       
if($resultatConsulta)
{
    echo '<script> 
    alert("Aposta FETA! ");
    window.location.href="../userAdmin.php";</script>' ;
}
else
{
    echo '<script> 
    alert("Aposta NO feta...");
    window.location.href="../userAdmin.php";</script>' ; 
}