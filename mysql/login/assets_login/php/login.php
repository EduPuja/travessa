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

  <title>Login</title>
</head>
    <body class="vh-100 gradient-custom">
      
    
    </body>
</html>
<?php
session_start();      // SESION START PER DESPRES PODER COMPROVAR SI LA SESSIO ES D'UN ADMIN O DE UN USUARI
require("../../../../assets/php/connexioBD.php");



$correu = $_POST["email"];
$password = $_POST["contrassenya"];


if (!isset($correu ,$password))
{
  echo '<script language="javascript">alert("No pots entrar aqui");window.location.href="../../../login"</script>';
  session_destroy();
  
}
else
{
    $consulta = "SELECT isAdmin,email,contrassenya,nom from usuari WHERE email = '$correu'";

    $query = mysqli_query($connexio, $consulta);
    // ens dona el un array 
    $rows = mysqli_fetch_assoc($query);

     
    if($rows['isAdmin'] == 1)
    {

         // si ets admin
      
   
      #echo "ets admin";
      if(password_verify($password,$rows['contrassenya']))
      {
        $_SESSION['usuariAdmin'] = $rows['email'];
        #echo "password admin oka";

        if(isset($_SESSION['usuariAdmin']))
        {
          #echo "SESSIO ADMINISTRADOR PTA MADRE";
          //sessio administrador good
         

          header("Location: /mysql/admin/");
        }
        else
        {
          #echo"sessio admin shit";
          session_stop($_SESSION['usuariAdmin']);
          header("Location: /mysql/login/");
        }
      }
      else
      {
        header("Location: /mysql/login/");
         
      }

      
    }

    else
    {
       // ets USUARI
       if(password_verify($password,$rows['contrassenya']))
       {
          $_SESSION['usuari'] = $rows['email'];

          if(isset($_SESSION['usuari']))
          {
            header("Location: /mysql/user/");
          }
          else
          {
            
            session_stop($_SESSION['usuari']);
            header("Location: /mysql/login/");
          }

       }
       else
       {
          header("Location: /mysql/login/");
       }
     
    }
    
 
   
}
?>
