<?php
    require("../../../../assets/php/connexioBD.php");

    $correu = $_POST['email'];
    $nom = $_POST['nom'];
    $cognom = $_POST['cognom'];
    $password = $_POST['contrassenya'];

    // encriptacio password
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // seleciono tota la taula MENYS LA CARETERA
    $consulta = "SELECT email,nom,cognom,adreca FROM usuari WHERE email = '$correu'";

    $query = mysqli_query($connexio, $consulta);
  
    $rows = mysqli_num_rows($query);
    

    if($rows <= 0)
    {
        $update = "UPDATE usuari SET nom ='$nom',cognom ='$cognom',contrassenya = '$hash' WHERE email = '$correu'";
        $exito = mysqli_query($connexio,$update);

        if($exito)
        {
            echo "SE CANVIAT";
        }
        else
        {
            echo "nope";
        }
    }
?>