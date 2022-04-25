<?php
session_start();

if(isset($_SESSION['usuari']))
{
    session_unset();
    session_destroy();
    header("Location: /mysql/");
    exit();
}


?>