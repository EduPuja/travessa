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
<body class="vh-100 gradient-custom">
    
</body>
</html>
<?php
    require("../../../../assets/php/connexioBD.php");   

    $nomJugador = $_POST['nomJugador'];
    $dorcal = $_POST['dorcal'];
    $id_Equip = $_POST['idEquip'];

    #exemple de consulta
    #INSERT INTO `jugadors`(`nom`, `dorcal`, `id_Equip`) VALUES ('pepe',102,4)
    # CONUSLTA PER INSERTAR LES DADES DE POST A LA BBDD TRAVESSA

    $insert = "INSERT INTO jugadors (nom,dorcal,id_Equip) VALUES ('$nomJugador',$dorcal,$id_Equip)";

    $result = mysqli_query($connexio,$insert);

    if(result)
    {  # echo "esta NICE";
        echo '<script> 
        alert("Jugador Entrat! ");
        window.location.href="../crearPlayer.php";  </script>' ; 
    }
    else
    {
        # echo "esta sheeet";
        echo '<script> 
        alert("El jugador NO es correcte! ");
        window.location.href="../crearPlayer.php";  </script>' ; 
    }
// tencar la coneixo despres 
mysqli_close($connexio);
?>