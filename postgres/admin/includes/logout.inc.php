<?php
session_start();

if(isset($_SESSION['usuariAdmin']))
{
    session_unset();
    session_destroy();
    header("Location: /mysql/");
    exit();
}



?>