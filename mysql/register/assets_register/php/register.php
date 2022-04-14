<?php
#include "../../../../assets/php/connexioBD.php";
#REQUIERE EL CONEXIO PHP   
require("../../../../assets/php/connexioBD.php");

// VARIALBES POST DEL HTML
$nom = $_POST["nom"];
$cognom = $_POST["cognom"];
$adreca = $_POST["adreca"];
$correu = $_POST["email"];
$password = $_POST["contrassenya"];
// ENCRIPTACIO
$hash = password_hash($password, PASSWORD_DEFAULT);

    //echo "Password correct";
    

    //primer comprovar si existeix un correu 
    $consulta ="SELECT email FROM usuari WHERE email = '$correu'";
    $query = mysqli_query($connexio,$consulta);
    $rows = mysqli_num_rows($query);


    if($rows <=0)
    {
        #echo "hola";
        $insert = "INSERT INTO usuari VALUES(0,'$correu','$nom','$cognom','$hash','$adreca',NULL);";
        $exito = mysqli_query($connexio,$insert);
        if($exito)
        {
            echo "INSERTADA";


                // REDIRECIO CAP A LOGIN
                header("Location: ../../../login");
        }
        /*else
        {
            echo "NO HAS INSERTAT";
            //REDIRECIO 
        }*/
    }

    else
    {
        header("Location: ../../../home.html");
    }

mysqli_close($connexio);

?>