<?php
include 'namesbbdd.php';
$eanPost = $_POST["eanPost"];      

//Make Connection DB
	$conn = new mysqli($serverdbname, $serverdbusername, $serverdbpassword, $dbName);
	
	//Check Connection
	if(!$conn){
		die("Connection Failed. ". mysqli_connect_error());
	}
	// Cerquem l'usuari a la BBDD
	$bbddOk = 1;
	$sql = "SELECT cod FROM SILICONA_ean where ean = '".$eanPost."'"; 
	$result = mysqli_query($conn ,$sql);
	if ($result){
	//	echo "Succefulled !! 1 <br>";
		if (mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);
			$id_cod = $row["cod"];
			$sql = "SELECT nom, valor FROM SILICONA_object where num = '".$id_cod."'"; 
			$result = mysqli_query($conn ,$sql);	
			if ($result){
		//		echo "Succefulled !! 2 <br>";
				if (mysqli_num_rows($result)>0){
					$row = mysqli_fetch_assoc($result);
					$id_nom = $row["nom"];
					$id_val = $row["valor"];
					$id_enl = "https://smx2.s3.amazonaws.com/2020/silicona/$id_cod.png";
		//			echo "Prova Té valor--> ".$id_val;
		//			echo "Prova Té nom--> ".$id_nom;
				}else{
					echo "ERROR : Num rows = ".(mysqli_num_rows($result));
				}
			}else{
				$bbddOk = -1; // Error de connexió
			}
		}else{
			$bbddOk = -2; // Codi de producte no trobat
		}
	}else{
		$bbddOk = -1; // Error de connexió
	}
	

	if ($bbddOk == 1)
	{
		$res=array();
		$res[0]= $id_cod;
		$res[1]= $id_nom;
		$res[2]= $id_val;
		$res[3]= $id_enl;
		echo("#codi:".$res[0]."#nom:".$res[1]."#valor:".$res[2]."#enl:".$res[3]);	
	}else{
		echo "Hi ha hagut algun error: Codi d'error  ".$bbddOkb;
	}
?>