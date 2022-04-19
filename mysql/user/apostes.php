<?php
session_start();
if(!isset($_SESSION['usuari']) && !isset($_SESSION['usuariAdmin']))
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
    <link rel="icon" type="image/png" href="../../assets/img/icons/footway.ico"/>
    <link href="../../assets/css/main.css" rel="stylesheet" type="text/css">
    
</head>
    <body class="vh-300 gradient-custom">
        <!--Comentario de index admin-->
        <br>
        <br>
        <br>
        <div class="container py-4 h-400">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-4 mt-md-4 pb-5">
                                <h1  class="fw-bold mb-2 text-uppercase">APOSTAR</h1>
                                <h3 class="fw mb-3 text-uppercase">Estas apostant a </h3>
                                    <?php 
                                        require("../../assets/php/connexioBD.php");
                                        $partit = $_POST['partitApostar']; 
                                        $query = "SELECT e.nom as local, e1.nom as visitant from equip e INNER JOIN partit p on e.id_equip = p.id_equiplocal INNER JOIN equip e1 on e1.id_equip = p.id_equipVisitant WHERE Id_partit = $partit";
										$result = mysqli_query($connexio,$query);
										if($row = mysqli_fetch_assoc($result))
                                        {
                                            echo "<form class='from-control' action='assets_user/includes/insertAposta.inc.php' method='post'>
                                                        <div class='form-outline form-white mb-4'>
                                                            <select class='form-control' name='partit' for='partit'>
                                                                <option class='text-center' value =".$row['Id_partit'].">".$row['local']." vs ".$row['visitant']."'</option>
                                                            </select>
                                                        </div>
                                                        <div class='form-outline form-white mb-4'>
                                                            <input type='number' name='rondesLocal' id='rondesLocal' class='form-control form-control-sm text-center' placeholder='Numero de rondes Local...' required />
                                                        </div>
                                                        <div class='form-outline form-white mb-4'>
                                                            <input type='number' name='rondesVisitant' id='rondesVisitant' class='form-control form-control-sm text-center' placeholder='Numero de rondes Visitant...' required />
                                                        </div>
                                                        <div class='form-outline form-white mb-4'>
                                                            <input type='number' name='calersAposta' id='calersAposta' class='form-control form-control-sm text-center' placeholder='Quants calers vos apostar??' required />
                                                        </div>
                                                        <button class='btn btn-outline-warning btn-sm px-4 mb-5' type='submit'>Apostar</button>
                                                  </form>";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>