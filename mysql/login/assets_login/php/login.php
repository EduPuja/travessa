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
  <title>LOGIN php</title>
</head>
<body>
    <!--<script>

    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Contrassenya Mala!',
      confirmButtonText:
      '<i class="fa fa-thumbs-up"></i> ' +
      '<a href="../../../login">Tornar al login!</a> ',
    });


    </script>-->
  </body>
</html>
<?php


#include "../../../assets/php/connexioBD.php";
require("../../../../assets/php/connexioBD.php");


$correu = $_POST["email"];
$password = $_POST["contrassenya"];

if (!isset($correu ,$password))
{
  echo '<script language="javascript">alert("No pots entrar aqui");window.location.href="../../../login"</script>';

}
else
{
    $consulta = "SELECT isAdmin,email,contrassenya from usuari WHERE email = '$correu'";

    $query = mysqli_query($connexio, $consulta);
    // ens dona el un array 
    $rows = mysqli_fetch_assoc($query);
    
    
    if($rows >= 0)
    {
      if($rows['isAdmin'] == 1)
      {
        
        
        if(password_verify($password, $rows["contrassenya"]))
        {
          echo '<script>
            
              Swal.fire({
                icon: "success",
                title: "OKA",
                text: "Hola ADMINITRADOR" ,
                confirmButtonText:
                "<i class=fa fa-thumbs-up>Nice</i> " +
                "<a href=../../../user/menu.php>ANAR MENU!</a> ",
              })
    
            
              </script>';
          



        }
        else
        {
          #PASSWORD ADMIN MALA
        echo '<script>
            
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Contrassenya Mala!",
                confirmButtonText:
                "<i class=fa fa-thumbs-down>Tornar al </i> " +
                "<a href=../../../login>LOGIN</a> ",
              })
    
            
              </script>';
    
            // header("Location: ../../../login");
                    
            
    
        
        }
        # window.location.href="../../../login"
      }
      else
      {
        
        
        if(password_verify($password, $rows["contrassenya"]))
        {
          echo '<script>
            
              Swal.fire({
                icon: "success",
                title: "OKA",
                text: "Hola usuari" ,
                confirmButtonText:
                "<i class=fa fa-thumbs-up>Nice</i> " +
                "<a href=../../../user/menuUser.php>ANAR MENU!</a> ",
              })
    
            
              </script>';
        
        }
        else
        {
          #PASSWORD USUARI MALA
          echo '<script>
            
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Contrassenya Mala!",
            confirmButtonText:
            "<i class=fa fa-thumbs-down>Tornar al </i> " +
            "<a href=../../../login>LOGIN</a> ",
          })

        
          </script>';
        }
        
      }
    
    }
    else
    {
      // poner alert
      echo '<script>
            
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Contrassenya o Correu incorretctes!",
        confirmButtonText:
        "<i class=fa fa-thumbs-down>Tornar al </i> " +
        "<a href=../../../login>LOGIN</a> ",
      })

    
      </script>';
    }
}
