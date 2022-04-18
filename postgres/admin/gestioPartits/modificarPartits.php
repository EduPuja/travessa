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
                <div class="col-100 col-md-60 col-lg-45 col-xl-40">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-4 mt-md-4 pb-5">
                                <h1 class="fw mb-2 text-uppercase">MODIFICAR PARTIT</h1>
                                <h4 class="text-white-50 mb-5">Escull una opcio.</h4>
                                <form class="from-control" action="assets_gestioPartits/alterPartits.php" method="post">
						            <div class="form-outline form-white mb-4">
                                        <h5 class="text-white-50 mb-2 text-center">Partits acutuals</h5>
                                        <select class="form-control" name="partit" for="partit">
                                            <optgroup class="text-center" label="Partits">
                                                <?php 

                                                    require("../../../assets/php/connexioBD.php");
                                                    $query = "SELECT p.Id_partit,e.nom as local, e1.nom as visitant, CASE WHEN res_Local IS NULL and res_Visitant IS NULL THEN 'Activada' WHEN res_Local IS NOT NULL and res_Visitant IS NOT NULL THEN 'Desactivada' END AS result from equip e INNER JOIN partit p on e.id_equip = p.id_equiplocal INNER JOIN equip e1 on e1.id_equip = p.id_equipVisitant";
                                                    $result = mysqli_query($connexio,$query);
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        if($row['result'] == 'Activada')
                                                        {
                                                            echo "<option class='text-center' value ='".$row['p.Id_partit']."'>Local= ".$row['local']." vs ".$row['visitant']." = Visitant</option>";
                                                        }
                                                     }
                                                    //echo "<option value='equip'>Escull una opcio</option>";
                                                ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="number" name="rondesLocal" id="rondesLocal" class="form-control form-control-sm text-center" placeholder="Rondes equip local... " required />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="number" name="rondesVisitant" id="rondesLocal" class="form-control form-control-sm text-center" placeholder="Rondes equip visitant... " required />
                                    </div>
                                    <button class="btn btn-outline-secondary btn-sm px-4 mb-5" type="submit">Enviar</button>
                                </form>
                                <button type="button"  class="btn btn-outline-warning" onclick="  location.href = '../gestioPartits/'">TORNAR ENRERE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>