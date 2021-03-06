<!-- HA DE SER UN PHP PER QUE COMPROVI QUE LA SESSIO ESTA INICIALITZADA-->
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
  <title>Usuari</title>
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
                    
					<li><a href="/mysql/user/" class="nav-link px-2 text-danger active">Inici</a></li>
                    <li><a href="/mysql/user/infoApoestesUser.php" class="nav-link px-2 text-white">Info Apost</a></li>
					<li><a href="perfil.php" class="nav-link px-2 active text-white" >Perfil</a></li>
	
					<!--logout usuari-->
					<button type="button"  class="btn btn-warning" onclick="  location.href = 'assets_user/includes/logout.inc.php'">Log out</button>
					
         		</ul>
			</div>
		</div>
	</nav>
        <!--Comentario de index admin-->
        <br>
        <br>
        <br>
        <div class="container py-4 h-400">
            <div class="row d-flex justify-content-center align-items-center h-1000">
                <div class="col-120 col-md-80 col-lg-60 col-xl-50">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-4 mt-md-4 pb-5">
                                <h1 class="fw mb-2 text-uppercase">Apostes Actuals</h3>
								<!--Aqui comen??a la taula-->
                                <table class="text-center text-white table table-bordered">
									<thead>
										<tr class="text-center">
											<th class="text-center">Partit</th>
											<th class="text-center">Activada/Desactivada</th>
										</tr>
									</thead>
									<br>
									<br>
									<tbody>
									<?php
										require("../../assets/php/connexioBD.php");
										$query = "SELECT e.nom as local, e1.nom as visitant, CASE WHEN res_Local IS NULL and res_Visitant IS NULL THEN 'Activada' WHEN res_Local IS NOT NULL and res_Visitant IS NOT NULL THEN 'Desactivada' END AS result from equip e INNER JOIN partit p on e.id_equip = p.id_equiplocal INNER JOIN equip e1 on e1.id_equip = p.id_equipVisitant";
										$result = mysqli_query($connexio,$query);
										while($row = mysqli_fetch_assoc($result))
										{	
										
											if($row['result']== 'Activada')
											{
												
												# echo per imprimir els resultats a la taula aquest es per quant esta activada
												echo "<tr><th class =text-center> $row[local] VS $row[visitant] </th><th class=text-success> $row[result]</th>";
											}
											else
											{
												# echo per imprimir els resultats a la taula aquest es per quant esta DESActivada
												echo "<tr><th class =text-center> $row[local] VS $row[visitant] </th><th class=text-danger> $row[result]</th>";
											}
										}
										mysqli_close($connexio);
										?>
									</tbody>
								</table>
								<!--<p class="text-white-50 mb-3">Si vos apostar escull una opcio.</p>-->
								<form class="from-control" action="apostes.php" method="post">
						            <div class="form-outline form-white mb-4">
                                        <select class="form-control" name="partitApostar" for="partitApostar">
                                            <optgroup class="text-center" label="Partits">
											<?php 
												require("../../assets/php/connexioBD.php");
												$query = "SELECT Id_partit,e.nom as local, e1.nom as visitant, CASE WHEN res_Local IS NULL and res_Visitant IS NULL THEN 'Activada' WHEN res_Local IS NOT NULL and res_Visitant IS NOT NULL THEN 'Desactivada' END AS result from equip e INNER JOIN partit p on e.id_equip = p.id_equiplocal INNER JOIN equip e1 on e1.id_equip = p.id_equipVisitant";
                                                $result = mysqli_query($connexio,$query);
												while($row = mysqli_fetch_assoc($result))
												{
													if($row['result'] == 'Activada')
													{
														echo "<option class='text-center' value = ".$row['Id_partit'].">Local= ".$row['local']." vs ".$row['visitant']." = Visitant</option>";
													}
												}
												//echo "<option value='equip'>Escull una opcio</option>";
											?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <button class="btn btn-outline-warning btn-sm px-4 mb-5" type="submit">Apostar</button>
                                </form>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>