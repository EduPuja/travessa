<?php
include 'namesbbdd.php';    

//Make Connection DB
	$conn = new mysqli($serverdbname, $serverdbusername, $serverdbpassword, $dbName);
	
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	// Cerquem l'usuari a la BBDD
	$bbddOk = 1;
	$sql = "SELECT cod, nom, valor FROM SILICONA_object "; 
	$result = mysqli_query($conn ,$sql);	
	if ($result){
		if (mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
			    printf ("%s (%s)\n", $row["Lastname"], $row["Age"]);
			/*	$id_cod = $row["cod"];
				$id_nom = $row["nom"];
				$id_val = $row["valor"];
				$id_enl = "https://smx2.s3.amazonaws.com/2020/silicona/$id_cod.png";*/
			}else{
				echo "ERROR : Num rows = ".(mysqli_num_rows($result));
			}
		}else{
			echo "ERROR : Sresult = ".$result;
	}
	
	
/*
	if ($bbddOk == 1)
	{
		$res=array();
		$res[0]= $id_cod;
		$res[1]= $id_nom;
		$res[2]= $id_val;
		$res[3]= $id_enl;
/
		echo("#codi:".$id_cod[0]."#nom:".$res[1]."#valor:".$res[2]."#enl:".$res[3]);	
	}else{
		echo "Hi ha hagut algun error: Codi d'error  ".$bbddOkb;
	}*/
?>