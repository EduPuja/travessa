<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../../../../assets/img/icons/footway.ico"/>
    <link href="../../../../assets/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
    
</body>
</html>
<?php
    require("../../../../assets/php/connexioBD.php");   

    $nomJugador = $_POST['nomJugador'];
    $dorsal = $_POST['dorsal'];
    $id_Equip = $_POST['idEquip'];


    # CONUSLTA PER INSERTAR LES DADES DE POST A LA BBDD TRAVESSA
    $query = "INSERT INTO jugadors (nom,dorsal,id_Equip) VALUES ('$nomJugador',$dorsal,$id_Equip)";

    $result = mysqli_query($connexio,$query);

    if($result)
    {
        echo "oka";
    }
    else
    {
        echo "mal";
    }

?>