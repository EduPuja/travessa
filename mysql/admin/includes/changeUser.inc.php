<?php
    require("../../../assets/php/connexioBD.php");

    $correu = $_POST['email'];
    $nom = $_POST['nom'];
    $cognom = $_POST['cognom'];
    $password = $_POST['contrassenya'];

    // encriptacio password
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // seleciono tota la taula MENYS LA CARETERA
    //$consulta = "SELECT email,nom,cognom,adreca FROM usuari WHERE email = '$correu'";

    
   $update = "UPDATE usuari SET nom ='$nom',cognom ='$cognom',contrassenya = '$hash' WHERE email = '$correu'";
    $exito = mysqli_query($connexio,$update);

        if($exito)
        {
            echo '<script> 
		    alert("Les teves dades han sigut actualizades");
		    window.location.href="../";  </script>' ; 
        }
        else
        {
            echo "nope";
        }
?>