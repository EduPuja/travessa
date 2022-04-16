<!-- HA DE SER UN PHP PER QUE COMPROVI QUE LA SESSIO ESTA INICIALITZADA-->
<?php
session_start();

if(!isset($_SESSION['usuari']))
{
  echo '<script> 
  alert("Necessites registrarte abans de poder entrar ");
  

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
    <link href="../../../../assets/css/main.css" rel="stylesheet" type="text/css">
    
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
                                <h1 class="fw mb-2 text-uppercase">CREAR PARTITS</h3>
                                <h3 class="text-white-50 mb-5">Inserta les dades del partit.</h3>
                                <form class="from-control" action="assets_gestioPartits/insertPartits" method="post">
						            <div class="form-outline form-white mb-4">
                                        <select class="form-control" name="equipLocal">
                                            <?php                
                                                $query = "SELECT nom from equip";
                                                $result = mysqli_query($connexio,$query);
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                     echo "<option value='equip'>".$row['equip']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
					            	<div class="form-outline form-white mb-4">
                                        <input type="text" name="cognom" id="cognom" class="form-control form-control-lg" placeholder="Cognom" required />
                                    </div>
						            <div class="form-outline form-white mb-4">
                                        <input type="text" name="adreca" id="adreca" class="form-control form-control-lg" placeholder="Adeça" required />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email" required />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="contrassenya" id="contrassenya" class="form-control form-control-lg" placeholder="Password" required />
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">SingIn</button>
                                </form>
                                <button type="button"  class="btn btn-outline-warning" onclick="  location.href = '../user/'">MENU ADMINISTRADOR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>