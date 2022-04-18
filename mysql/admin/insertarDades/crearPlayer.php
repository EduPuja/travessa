<?php
session_start();
if(!isset($_SESSION['usuariAdmin']))
{
  echo '<script> 
  alert("No ets admin! FORA DE AQUI NO ET VOLEM  ");
  window.location.href="../../login/";  </script>' ; 
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Jugador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../../../assets/img/icons/footway.ico"/>
    <link href="../../../../assets/css/main.css" rel="stylesheet" type="text/css">
</head>
<body class="vh-100 gradient-custom">
    <!--Comentario de index admin-->
    <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                      <div class="mb-md-5 mt-md-4 pb-5">
          
                        <h2 class="fw-bold mb-2 text-uppercase">Crear Jugador</h2>
                        <p class="text-white-50 mb-5">Entra un jugador</p>
                        <form class="from-control" action="###" method="post">
                            <div class="form-outline form-white mb-4">
                                <input type="text" name="nom" id="nom" class="form-control form-control-lg" placeholder="Nom Jugador" required/>
                            </div>
              
                            <div class="form-outline form-white mb-4">
                              <input type="number" name="dorsal" id="dorsal" class="form-control form-control-lg" placeholder="Num Dorsal" required/>
                            </div>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Crear</button> 
                        </form>
                      </div>
                      
      
                </div>
              </div>
            </div>
          </div>
        </div>
   
    
</body>
</html>