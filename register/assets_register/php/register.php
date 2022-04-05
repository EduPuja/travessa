<html>
    <head>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

</html>

<?php
include "../../../assets/php/connexioBD.php";

$nom = $_POST["nom"];
$cognom = $_POST["cognom"];
$adreca = $_POST["adreca"];
$correu = $_POST["email"];
//! se ha de encriptar
// password_verify
$password = $_POST["contrassenya"];

$hash = password_hash($password, PASSWORD_DEFAULT);

    //echo "Password correct";
    

    //primer comprovar si existeix un correu 
    $consulta ="SELECT email FROM usuari WHERE email = '$correu'";
    $query = mysqli_query($connexio,$consulta);
    $rows = mysqli_num_rows($query);


    if($rows == 0)
    {
        $sql = "INSERT INTO usuari (email,nom,cognom,adreca,contrassenya) VALUES('$correu','$nom','$cognom','$adreca','$hash')";

        if(mysqli_query($connexio,$sql))
        {
            echo"
            <script> 
                 swal(
                     {
                         title:'Register Oka',
                         text: 'Te has registrat correctament',
                         icon: 'success',
                     }
                 );
                 location.href ='../../../login'
               
            </script>";

          //  header("Location: ../../../../..");
            /*echo '<script> 
            alert("Usuari Creat correctament"); 
            location.href = "../../../../../";
            </script>';*/
        // setInterval(location.href ='../../../../../', 3000);

            //header("Location: ../../../../..");
               
        }
        else{
         
            echo "Error: " . $sql . "<br>" . mysqli_error($connexio);
        }
    }

    else{
        /*echo '<script> 
        alert("El usuari ja esta creat"); 
        location.href = "../../../login";
        </script>';*/

        echo"
            <script> 
            swal('El usuari ja esta creat','$nom','error');

            </script>
            <script>
             location.href = '../../../../../';
            </script>
            ";
       

    }
//no se si aixo es problema
mysqli_close($connexio);
?>