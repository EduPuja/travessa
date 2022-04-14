<?php
#include "../../../../assets/php/connexioBD.php";
#REQUIERE EL CONEXIO PHP   
require("../../../../assets/php/connexioBD.php");


$nom = $_POST["nom"];
$cognom = $_POST["cognom"];
$adreca = $_POST["adreca"];
$correu = $_POST["email"];
//! se ha de encriptar
// password_verify
$password = $_POST["contrassenya"];

$hash = password_hash($password, PASSWORD_DEFAULT);

    //echo "Password correct";
    

    //primer comprovar si existeix un correu 
    $consulta ="SELECT email FROM usuari WHERE email = '$correu'";
    $query = mysqli_query($connexio,$consulta);
    $rows = mysqli_num_rows($query);


    if($rows <=0)
    {
        echo "hola";
       $insert = "INSERT INTO usuari VALUES(0,'$correu','$nom','$cognom','$hash','$adreca',NULL);";
        $exito = mysqli_query($connexio,$insert);
       if($exito)
       {
           echo "INSERTADA";
       }
       else
       {
           echo "NO HAS INSERTAT";
       }
    }

    else
    {
        header("Location: ../../../home.html");
    }

mysqli_close($connexio);

?>