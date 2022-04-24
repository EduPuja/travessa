<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Equip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../../../assets/img/icons/footway.ico"/>
    <link href="../../../../assets/css/main.css" rel="stylesheet" type="text/css">
</head>
<body class="vh-100 gradient-custom">
    
</body>
</html>
<?php
require("../../../../assets/php/connexioBD.php");

$nomTeam = $_POST['nomEquip'];
$pais = $_POST['pais'];

$insert = "INSERT INTO equip (nom,pais) VALUES('$nomTeam','$pais')";

$result=mysqli_query($connexio,$insert);
if(result)
{
    echo '<script> 
  alert("Equip Entrat! ");
  window.location.href="../../insertarDades/crearTeam.php";  </script>' ; 
}
else
{
    echo '<script> 
    alert("Equip NO ENTRAT CORRECTE!");
    window.location.href="../../insertarDades/crearTeam.php";  </script>' ; 
}
mysqli_close($connexio);

?>