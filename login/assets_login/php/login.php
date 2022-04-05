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
      echo"
      <script>
        location.href ='../../../user/menu.php'
      </script>";
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
      echo"
      <script>
        location.href ='../../../user/index.php'
      </script>";
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