<?php
// variables per connectarte a la base de dades
$serverName = "localhost";
$database = "btravessa";

// usuari de exemple
$username = "root";
$password ="Dam2020!"; 

$connexio = mysqli_connect($serverName,$username,$password,$database);



if(!$connexio)
{
    die("Connexio Fail " . mysqli_connect_error());
    
}
else
{
    //echo "Connexio succes";
}

//mysqli_close($connexio);

?>