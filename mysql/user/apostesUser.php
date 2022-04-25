<?php
session_start();
#echo $_SESSION['usuari'];

if(!isset($_SESSION['usuari']))
	{
		echo '<script> 
		alert("Necessites registrarte abans de poder entrar ");
		window.location.href="../login/";  </script>' ; 
		session_destroy($_SESSION['usuari']);
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
                    <li><a href="/mysql/user/apostesUser.php" class="nav-link text-danger active ">My Apostes</a></li>
					<li><a href="/mysql/user/" class="nav-link px-2 text-white">Info Partits</a></li>
					<li><a href="perfil.php" class="nav-link px-2 text-white" >Perfil</a></li>
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
                                <h1 class="fw mb-2 text-uppercase">LES TEVES APOSTES</h3>
                                
                                <p class='text-white-50 mb-4'>Aqui tens totes les teves apostes.</p>

                                <table class="text-center text-white table table-bordered">
									<thead>
										<tr class="text-center">
											<th class="text-center">Partit</th>
                                            <th class="text-center">Resultat Apostat Local</th>
                                            <th class="text-center">Resultat Apostat Visitant</th>
											<th class="text-center">Diners Apostats</th>
										</tr>
									</thead>
									<br>
									<br>
									<tbody>
									<?php

										require("../../assets/php/connexioBD.php");
										$query = "SELECT id_usuari,p.Id_partit,e.nom as eLocal,e1.nom as eVisitant, p.res_Local as res_local,p.res_Visitant as res_Vis ,dinersApostats from aposta a INNER JOIN partit p on a.id_partit = p.Id_partit INNER JOIN equip e on e.id_Equip = p.id_EquipLocal INNER JOIN equip e1 on e1.id_Equip = p.id_EquipVisitant where id_usuari ='$_SESSION[usuari]'";
										$result = mysqli_query($connexio,$query);
										while($row = mysqli_fetch_assoc($result))
										{	
                                            if($row['res_local'] != null && $row['res_Vis'] != null)
                                            {
                                                $partit = $row['eLocal'] ." vs ". $row['eVisitant'];
                                                $resLocal = $row['res_local'];
                                                $resVisitant = $row['res_Vis'];
                                                $dinersApostats = $row['dinersApostats'];
                                                echo "<tr><th class='text-center'>$partit</th><th class='text-center'>$resLocal</th><th class='text-center'>$resVisitant</th><th class='text-center'>  $dinersApostats </th>";
                                            }
										}
										?>
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>