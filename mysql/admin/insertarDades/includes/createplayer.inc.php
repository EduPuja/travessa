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