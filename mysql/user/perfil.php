<?php
session_start();


if(!isset($_SESSION['usuari']) && !isset($_SESSION['usuariAdmin']))
	{
		echo '<script> 
		alert("Necessites registrarte abans de poder entrar ");
		window.location.href="../login/";  </script>' ; 
		session_destroy();
		#header("Location ../../home.html"); 
 
	}


    


   


?>
<html lang="es">
<head>
  <title>Perfil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/png" href="../../assets/img/icons/footway.ico">
  <!--CSS DE TAULES   -->
  <!--<link href="./assets_user/css/user.css" type="text/css" rel="stylesheet">-->
  <link href="../../assets/css/main.css" rel="stylesheet" type="text/css">
  


</head>
<body class="gradient-custom">
		<!--Barra de navegacio-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin-left:300px; margin-right:300px; border-radius:1rem;">
		<div class="container-fluid">
			<a class="navbar-brand" href="/mysql/user/">
			<img src="../../assets/img/icons/footway.ico" alt="LogoFootway" style="width:40px;" class="rounded-pill"> FootWay
			</a>
			<div>
				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
					<li><a href="/mysql/user/" class="nav-link px-2 text-white ">Info Partits</a></li>
					<li><a href="#" class="nav-link px-2 text-white ">Apostes</a></li>
					<li><a href="perfil.php" class="nav-link px-2 active text-danger" >Perfil</a></li>

					
				
					
         		</ul>
			</div>
		</div>
	</nav>
        <!--Coisitas perfil-->
        <br>
        <br>
        <br>
        <div class="container py-4 h-400">
            <div class="row d-flex justify-content-center align-items-center h-1000">
                <div class="col-120 col-md-80 col-lg-60 col-xl-50">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-4 mt-md-4 pb-5">
                                <h1 class="fw mb-2 text-uppercase">Perfil Usuari <?php echo"@". $_SESSION['usuari']; echo $_SESSION['usuariAdmin'];?></h3>
                                
                                <p class="text-white-50 mb-3">Aqui esta tota la teva informacio</p>
                                
                                <form class="from-control" action="" method="post">
									<?php
										require("../../assets/php/connexioBD.php");
                                        #$query = "SELECT email,CASE WHEN isAdmin = 0 AND nom ='$_SESSION[usuari]' THEN nom WHEN isAdmin =1 AND nom='$_SESSION[usuariAdmin]' THEN nom END as nom_usuari,cognom,adreca,cartera FROM usuari";
										$query = "SELECT email,CASE WHEN isAdmin = 0 AND nom ='$_SESSION[usuari]' THEN nom WHEN isAdmin =1 AND nom='$_SESSION[usuariAdmin]' THEN nom END as nom_usuari,cognom,adreca,cartera FROM usuari";
										$result = mysqli_query($connexio,$query);

                                        if($result)
                                        {   
                                            $row = mysqli_fetch_assoc($result);
                                            echo "<h5 class='text-white-50 text-uppercase mb-3'>Correo Electronic: ". $row['email']." <h5>";
                                            echo "<h5 class='text-white-50 text-uppercase mb-3'>Nom: ". $row['nom_usuari']. " ". $row['cognom']. " <h5>";
                                            echo "<h5 class='text-white-50 text-uppercase mb-3'>Adeça: ". $row['adreca']. " <h5>";

                                            echo "<p class='text-white-50 mb-4'>Vos modificar alguna dada?? </p>";

                                            #nom
                                            echo"<div class='form-outline form-white mb-4'>
                                                  <input type='text' name='nom' placeholder='New Name'  id='nom' class='form-control form-control-lg'  />
                                              </div>";
                                            #cognom
                                            echo"<div class='form-outline form-white mb-4'>
                                                      <input type='text' name='cognom' placeholder='New Cognom'  id='cognom' class='form-control form-control-lg'  />
                                                 </div>";
                                           
                                            #adreca
                                            echo"<div class='form-outline form-white mb-4'>
                                                <input type='text' name='adreca' placeholder='Nova Adreça'  id='contrassenya' class='form-control form-control-lg'  />
                                            </div>";

                                             #password
                                            echo"<div class='form-outline form-white mb-4'>
                                                <input type='password' name='contrassenya' placeholder='Nova Password'  id='contrassenya' class='form-control form-control-lg'  />
                                            </div>";
                                         
                                        }
                                        else
                                        {
                                           echo " adeu"; 
                                        }
										
										?>
                               
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Enviar</button> 
                            </form>


							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>