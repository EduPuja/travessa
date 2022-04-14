<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../../assets/img/icons/footway.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="../../../../assets/css/main.css" rel="stylesheet" type="text/css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" href="../../../../assets/img/icons/footway.ico"/>

  <title>Register</title>
</head>
    <body>
      
    <section class="vh-100 gradient-custom">
        
      </section>
    </body>
</html>

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
             #echo "INSERTADA";


                // REDIRECIO CAP A LOGIN
            #header("Location: ../../../login");

            echo '<script>
            
              Swal.fire({
                icon: "success",
                title: "OKA",
                text: "Registre Correcte" ,
                confirmButtonText:
                "<i class=fa fa-thumbs-up>GO</i> " +
                "<a href=../../../login>Log in</a> ",
              })
    
            
              </script>';
          
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