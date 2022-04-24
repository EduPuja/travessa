<?php
session_start();
if(!isset($_SESSION['usuariAdmin']))
{
  echo '<script> 
  alert("No ets admin! FORA DE AQUI NO ET VOLEM  ");
  window.location.href="../login/";  </script>' ; 
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Interficies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../../../assets/img/icons/footway.ico"/>
    <link href="../../../../assets/css/main.css" rel="stylesheet" type="text/css">
    
</head>
    <body class="vh-300 gradient-custom">
        <!--Comentario de index admin-->
        <br>
        <br>
        <br>
        <div class="container py-4 h-400">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-120 col-md-80 col-lg-60 col-xl-50">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-4 mt-md-4 pb-5">
                                <h1 class="fw mb-2 text-uppercase text-warning">TAULA APOSTES USUARIS</h1>
                                <h4 class="text-white-50 mb-5">Aqui tens la taula d'apostes dels usuaris amb totes les seves dades.</h4>
						            <div class="form-outline form-white mb-4">
                                        <table class="text-center text-white table table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="text-center text-warning">Correo Usuari</th>
											        <th class="text-center text-warning">Id_Partit Apostat</th>
											        <th class="text-center text-warning">Resultat Local</th>
                                                    <th class="text-center text-warning">Resultat Visitant</th>
                                                    <th class="text-center text-warning">Calers Apostats</th>
                                                </tr>
                                            </thead>
                                            <br>
                                            <br>
                                            <tbody>
                                                <?php
                                                require("../../../assets/php/connexioBD.php");
                                                $query = "SELECT id_usuari as correoUsuari, id_partit,res_local,res_Visitant,dinersApostats from aposta";
                                                $result = mysqli_query($connexio,$query);
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    echo"<tr>
                                                    <th class='text-center'>".$row['correoUsuari']."</th>
                                                    <th class='text-center'>".$row['id_partit']."</th>
                                                    <th class='text-center'>".$row['res_local']."</th>
                                                    <th class='text-center'>".$row['res_Visitant']."</th>
                                                    <th class='text-center'>".$row['dinersApostats']."</th>
                                                        ";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <button type="button"  class="btn btn-outline-warning" onclick="  location.href = '../visualitzarTaules/'">TORNAR ENRERE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>