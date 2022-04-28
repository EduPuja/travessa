<?php
include 'floginbd.php';
	
$uname = $_POST["nom_usuari"];   // "alexitu"; //
$upass = $_POST["password"];   // "alex@alexitu.org"; //

$res=loginbd($uname, $upass);

if ($res==0)
{
	echo("Tot OK !!!");
}
if ($res==1)
{
	echo("Error connexió");
}
if ($res==2)
{
	echo("Error: Password incorrecte");
}
if ($res==3)
{
	echo("Error: Usuari desconegut");
}
?>
		
	
	