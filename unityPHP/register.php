<?php

$serverName = "localhost";
$database = "unityJSON";

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
    #echo "Connexio succes";


    $nom= $_POST["nom_usuari"];
    $password =$_POST["password"];

    if(!isset($nom) && !isset($password))
    {
        echo "Variables buides";
    }
    else
    {
        $insert = "INSERT INTO user (nom_usuari,password) VALUES($nom,$password)";
        $result = mysqli_query($connexio,$insert);

        if($result)
        {
            echo "nice";
        }
        else
        {
            echo "no insert";
        }

    }


 
 }
mysqli_close($connexio);

?>