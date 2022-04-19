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
    
   
    
    
    if($rows >= 0)
    {
        // si ets admin
        if($rows['isAdmin'] == 1)
        {
         
            $_SESSION['usuariAdmin']= $rows['email'];     // creo una varialbe de sessio amb el correu d'admin
            if(password_verify($password, $rows["contrassenya"])) 
            { 
              // COMPROVO QUE LA SI ESTA BE

              if(isset($_SESSION['usuariAdmin']))
              {
                header("Location: ../../../admin/");
              }
              
             
               

            }
            else
            {
              
              // password admin incorrecte
                  
                header("Location: ../../../login");
                session_destroy();
            }
      
        }
        // SINO SI ES USUARI
        else if($rows['isAdmin'] == 0)
        {
            $_SESSION['usuari']= $rows['email'];
              if(password_verify($password, $rows["contrassenya"]))
              {
              
                  // USUARI
                  if(isset($_SESSION['usuari']))
                  {
                    header("Location: ../../../user/");
                  }

                 
                 
                
              }
              else
              {
                // fora de aqui si no esta be la contrassenya
                header("Location: ../../../login");
                session_destroy();
                
              }
          
        }

        else
        {
          header("Location: ../../../login");
          session_destroy();
        }
      
    }
    else
    {
     
      header("Location: ../../../login");
      session_destroy();
   
    }
}
?>
