<?php
include "../../../assets/php/connexioBD.php";

$correu = $_POST["email"];
$password = $_POST["contrassenya"];

$consulta = "SELECT isAdmin,email,contrassenya from usuari WHERE email = '$correu'";
$query = mysqli_query($connexio, $consulta);
$rows = mysqli_fetch_assoc($query);
//print_r($rows);

if($rows >= 0)
{
  if($row["isAdmin"] == 1)
  {
    if(password_verify($password, $rows["contrassenya"]))
    {
     // header("Location: /mysql/user/menu.php");
      echo"location.href ='../../user/menu.php'";
      //redireccio a pagina admin
    }
    else{
      echo "La contrassenya no es correcte";
    }
  }
  else
  {
    if(password_verify($password, $rows["contrassenya"]))
    {
      header("Location: ../../user/assets_user/menuUser.php");
      /*echo"
      <script>
        location.href ='../../user/menuUser.php'
      </script>";*/
      //redireccio a pagina user
    }
    else{
      echo "La contrassenya no es correcte";
    }
  }
 
}
else{
  echo "El correu no es correcte";
}