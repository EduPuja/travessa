<?php
// variables per connectarte a la base de dades
$serverName = "localhost";
$database = "btravessa";

// usuari de exemple
$username = "postgres";
$password ="Dam2020!"; 

$connexio = psqli_connect($serverName,$username,$password,$database);



if(!$connexio)
{
    die("Connexio Fail " . psqli_connect_error());
    
}
else
{
    echo "Connexio succes";
}

//mysqli_close($connexio);

?>