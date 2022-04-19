<?php
    require("../../../../assets/php/connexioBD.php");

    $correu = $_POST['email'];
    $nom = $_POST['nom'];
    $cognom = $_POST['cognom'];
    $password = $_POST['contrassenya'];

    // encriptacio password
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // seleciono tota la taula MENYS LA CARETERA
    $consulta = "SELECT isAdmin,email,contrassenya,nom,cognom,adreca FROM usuari WHERE email = '$correu'";

    $query = mysqli_query($connexio, $consulta);
  
    $rows = mysqli_fetch_assoc($query);
    

    if($rows >= 0)
    {

      if($rows['isAdmin'] == 1)
      {
          $insert = "ALTER TABLE usuari "
      }
    }
?>