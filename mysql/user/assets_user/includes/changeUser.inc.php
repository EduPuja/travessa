<?php
    require("../../../../assets/php/connexioBD.php");

    $correu = $_POST['email'];
    $nom = $_POST['nom'];
    $cognom = $_POST['cognom'];
    $password = $_POST['contrassenya'];


    $consulta = "SELECT isAdmin,email,contrassenya,nom from usuari WHERE email = '$correu'";
    $query = mysqli_query($connexio, $consulta);
    // ens dona el un array 
    $rows = mysqli_fetch_assoc($query);

?>