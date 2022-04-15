<?php
session_start();
if(!isset($_SESSION['usuari']))
{
  echo "fora de aqui";
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
        <!--Aqui se entra nomes si ets admin , sino t'envas directament al index.php-->
       
        

        
       
        <br>
        <br>
        <br>
        <div class="container py-4 h-200">
          <div class="row d-flex justify-content-center align-items-center h-300">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-4 mt-md-4 pb-5">
                  <h1  class="fw-bold mb-2 text-uppercase"> BENVINGUT <?php echo $_SESSION['usuari']; ?> </h1>
                    <h3 class="fw mb-2 text-uppercase">OPCIO MENU</h3>
                    <p class="text-white-50 mb-5">A quina interface vols anar Menu admin  o Menu usuari</p>
                    
                    
                </div>
              </div>
            </div>
          </div>
        </div>
    
        
    </body>
</html>