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
    
    $_SESSION['usuari']= $rows['nom'];
    
    if($rows >= 0)
    {
      if($rows['isAdmin'] == 1)
      {
     
        
        if(password_verify($password, $rows["contrassenya"]))
        {
            if(isset($_SESSION['usuari']))
            {
              # echo "hola admin";
                header("Location: ../../../admin/");
            }
              

        }
        else
        {
          
          // password admin incorrecte
              
             header("Location: ../../../login");
        }
     
      }
      else
      {
        
        
        if(password_verify($password, $rows["contrassenya"]))
        {
         
            // USUARI
            if(isset($_SESSION['usuari']))
            {
              #  echo "hola usuari";
              header("Location: ../../../user/");
            }
          
        }
        else
        {
          // fora de aqui si no esta be la contrassenya
          header("Location: ../../../login");
          
        }
        
      }
    
    }
    else
    {
     
      header("Location: ../../../login");
   
    }
}
?>
