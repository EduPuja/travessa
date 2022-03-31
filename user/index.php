<!-- HA DE SER UN PHP PER QUE COMPROVI QUE LA SESSIO ESTA INICIALITZADA-->
<?php
#include "./login/assets_login/php/connexioBD.php";
require "./login/assets_login/php/login.php";
//sesion_start isset
if(!isset($correu) && !password_verify($password))
{
	echo "Correu no registrat o contrassenya no correcte";
	header("../");
}
else
{
	echo "Succes";
}


/*if(!isset($_SESSION['usuari']))
{
  echo '
  <script> 
  alert("No estas logejat ");
  
  window.location.href="../../login.html";  </script>' ;   
}*/
?>
<html lang="es">
<head>
  <title>Usuari </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/png" href="../assets/img/icons/footway.ico">
  <!--EL STYLES LO HE PUESTO AQUI  -->
  <link href="./assets_user/css/user.css" type="text/css" rel="stylesheet" />
  

<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<div class="container-fluid">
				<form class="container-fluid justify-content-start">
					<a class="navbar-brand" href="#">
						<img src="../assets/img/icons/footway.ico" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
						FootWay
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
					</button>
					<button class="btn btn-outline-success me-2 active" type="button">Perfil</button>
					<button class="btn btn-sm btn-outline-secondary me-2 active" type="button">Les Meves Apostes</button>
					<button class="btn btn-sm btn-outline-secondary me-2 active" type="button">Millors Apostes</button>
				</form>
			</div>
		</nav>
		<div class="text-center">
			<h2>Apostes Actuals</h2>
	
			<table>
				<tr>
					<th>Partit</th>
					<th>Activada/Desactivada</th>
					<th>Apostar</th>
				</tr>
				<!--<tr>
					<td>INFO</td>
					<td>Activa</td>
					<td><button class="btn btn-sm btn-outline-secondary me-2 active">Apostar</button></td>
				</tr> -->

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
			<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d6dc02b8cd33a11',m:'uCSrOnEE5QKtLhDPgFhe8iLbZ94AnxqHfy6Oq2leWPA-1643745466-0-AX+6tEAnYDP4v7ONQgCgV4TC1T5wHcRdVbYk+8sTmdTvfxunLEkoO0TIwpiNKJs9j+ifUADFGrmnNg50jmmfUy5ZXVKD4isIjh0wGJ9ckRdLVT+7kEqilTcm/GrjcbQtQyBBe962T+Y1AwS5lp9fpk9i1G+x9cxRyIixPw9ATWUYtS9w9Pjv0O0J/ZsYXVXcQ9KddOzF+ZKnNjqNSrHPS60=',s:[0x56a9a59ca2,0x3d1ba5a652],}})();</script></body>

		</div>
		
</html>

