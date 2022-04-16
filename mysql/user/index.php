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
<html lang="es">
<head>
  <title>Usuari</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/png" href="../../assets/img/icons/footway.ico">
  <!--CSS DE TAULES   -->
  <link href="assets_user/css/user.css" type="text/css" rel="stylesheet" />
  <link href="../../assets/css/main.css" rel="stylesheet" type="text/css">
  


</head>
<body class="gradient-custom">
		<!--Barra de navegacio-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin-left:300px; margin-right:300px; border-radius:1rem;">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">
			<img src="../../assets/img/icons/footway.ico" alt="LogoFootway" style="width:40px;" class="rounded-pill"> FootWay
			</a>
			<div>
				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
					<li><a href="index.php" class="nav-link px-2 text-danger">Info Partits</a></li>
					<li><a href="#" class="nav-link px-2 text-white">Apostes</a></li>
					<li><a href="#" class="nav-link px-2 text-white">Perfi</a></li>
					<button type ="button" class="btn btn-outline-warning" onclick=<?php  ?>>LogOut</button>
					
					
         		</ul>
			</div>
		</div>
	</nav>

	<DIV>
		<!--eLIMINAR-->
</DIV>

		<!--Taules to mamades-->
	<div style="margin-left:300px; margin-right:300px; border-radius:1rem;" class="text-center text-light">
	  <h2>Apostes Actuals</h2>
	
		<table class="text-center text-dark">
			<tr class="text-center">
				<th class="text-center">Partit</th>
				<th class="text-center">Activada/Desactivada</th>
				<th class="text-center">Apostar</th>
			</tr>
				

			<?php
				$query = "SELECT e.nom as local, e1.nom as visitant, CASE WHEN res_Local IS NULL and res_Visitant IS NULL THEN 'Activada' WHEN res_Local IS NOT NULL and res_Visitant IS NOT NULL THEN 'Desactivada' END AS result from equip e INNER JOIN partit p on e.id_equip = p.id_equiplocal INNER JOIN equip e1 on e1.id_equip = p.id_equipVisitant";
				$result = mysqli_query($connexio,$query);
				while($row = mysqli_fetch_assoc($result))
				{
						
					echo "<tr><th>".$row['local']." vs ".$row['visitant']."</th><th> ".$row['result']." </th>";
					if($row['result']== 'Activada')
					{
						echo "<th><button class='btn btn-sm btn-outline-secondary me-2 active' type='button'>Apostar</button></th>";
					}
					echo "</tr>";
				}
				?>
		</table>
	</div>
</body>	
</html>

