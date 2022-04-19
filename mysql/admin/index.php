<?php
session_start();
if(!isset($_SESSION['usuariAdmin']))
{
  echo '<script> 
  alert("No ets admin! FORA DE AQUI NO ET VOLEM  ");
  window.location.href="../login/";  </script>' ; 
  session_stop($_SESSION['usuariAdmin']);
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
                                <h1  class="fw-bold mb-2 text-uppercase"> BENVINGUT  </h1>
                                <h3 class="fw mb-2 text-lowercase"><?php echo $_SESSION['usuariAdmin']; ?></h3>
                                <h3 class="fw mb-2 text-uppercase">MENU ADMINISTRADOR</h3>
                                <p class="text-white-50 mb-5">Escull l'opcio que vulgis.</p>
                                <button type="button"  class="btn btn-primary" onclick="  location.href = 'gestioPartits/'">GESTIO PARTITS</button><br><br>
                                <button type="button"  class="btn btn-primary" onclick="  location.href = 'insertarDades/'">INSERTAR DADES</button><br><br>
                                <button type="button"  class="btn btn-primary" onclick="  location.href = 'visualitzarTaules/'">VISUALITZAR TAULES</button><br><br><br>
                                <button type="button"  class="btn btn-warning" onclick="  location.href = 'userAdmin.php'">MENU USUARI</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>