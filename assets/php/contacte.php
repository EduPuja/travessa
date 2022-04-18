<?php 
require("connexioBD.php");

$nom = $_POST['nom'];
$email = $_POST['email'];
$descripcio =$_POST['descripcio'];


$insert = "INSERT INTO contacte (nom,email,descripcio) VALUES('$nom','$email','$descripcio')";

$result = mysqli_query($connexio,$insert);

if($result)
{
    echo '<script> 
    alert("GRACIES per el teu comentari! ");
    window.location.href="../../mysql/";  </script>' ; 

}
else
{
    echo '<script> 
    alert("Alguna cosa ha fallat...");
    window.location.href="../../mysql/";  </script>' ; 
}


mysqli_close($connexio);
?>
