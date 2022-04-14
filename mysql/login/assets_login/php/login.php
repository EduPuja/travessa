<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="sweetalert2.all.min.js"></script>

  <title>LOGIN php</title>
</head>

</html>
<?php
#include "../../../assets/php/connexioBD.php";
require("../../../../assets/php/connexioBD.php");

$correu = $_POST["email"];
$password = $_POST["contrassenya"];

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
      echo "hola ADMIN";
     // header("Location: /mysql/user/menu.php");
      #echo"location.href ='../../user/menu.php'";
      //redireccio a pagina admin
    }
    else
    {
      // poner alert
      #echo "La contrassenya no es correcte";
      #echo "Contrass"
    }
    # window.location.href="../../../login"
  }
  else
  {
    
    
    if(password_verify($password, $rows["contrassenya"]))
    {
      echo "HOLA USUARI";
      header("Location: ../../user/assets_user/menuUser.php");
    
    }
    else
    {
      // poner alert
      echo "La contrassenya  no es correcte";
    }
    
  }
 
}
else
{
  // poner alert
  echo "El correu no es correcte";
}