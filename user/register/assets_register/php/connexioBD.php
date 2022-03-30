<?php
// variables per connectarte a la base de dades
$serverName = "localhost";
$database = "btravessa";

// usuari de exemple
$username = "admin";
$password ="Dam2022!"; 

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