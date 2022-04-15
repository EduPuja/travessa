<?php
session_start();
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
           echo "hola admin";
            header("Location: ../../../user/menu.php");
         }
          
          
         // si ets admin
           
          /*echo '<script>
            
              Swal.fire({
                icon: "success",
                title: "OKA",
                text: "Hola ADMINITRADOR" ,
                confirmButtonText:
                "<i class=fa fa-thumbs-up>Nice</i> " +
                "<a href=../../../user/menu.php>ANAR MENU!</a> ",
              })
    
            
              </script>';*/

             
          
              


        }
        else
        {

          
          #PASSWORD ADMIN MALA
          /*echo '<script>
            
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Contrassenya Mala!",
                confirmButtonText:
                "<i class=fa fa-thumbs-down>Tornar al </i> " +
                "<a href=../../../login>LOGIN</a> ",
              })
    
            
              </script>';*/
              
             header("Location: ../../../login");
                    
          
            
        
        }
        # window.location.href="../../../login"
      }
      else
      {
        
        
        if(password_verify($password, $rows["contrassenya"]))
        {
         
         // USUARI
         if(isset($_SESSION['usuari']))
         {
          echo "hola usuari";
         }
          /*echo '<script>
            
              Swal.fire({
                icon: "success",
                title: "OKA",
                text: "Hola usuari" ,
                confirmButtonText:
                "<i class=fa fa-thumbs-up>Nice</i> " +
                "<a href=../../../user/menuUser.php>ANAR MENU!</a> ",
              })
    
            
              </script>';*/

             // header("Location ../../../user/menuUser.php");
        
        }
        else
        {
          
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
