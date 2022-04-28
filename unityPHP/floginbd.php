<?php
	
	// Funció loginbd( $username, $password)
	// Retorna _Ret  = 	0 --> ok
	//					1 --> Error connexió
	//					2 --> Password incorrecte
	//					3 --> Usuari desconegut
	// des-2019 Àlex
	// -----------------------------------------------------------------------
 
	function loginbd($username, $password)
	{
		include 'namesbbdd.php';
		$_Ret = 0;
		//Make Connection
		$conn = new mysqli($serverdbname, $serverdbusername, $serverdbpassword, $dbName);
		//Check Connection
		if(!$conn){
			die("Connection Failed. ". mysqli_connect_error());
			$_Ret = 1;
		}
		if ($_Ret == 0)
		{
		  $sql = "SELECT password FROM users WHERE nom = '".$username."'";
		  $result = mysqli_query($conn ,$sql);
    
		  if (mysqli_num_rows($result)>0) 
		   {
			  //show data for each row
			  while($row = mysqli_fetch_assoc($result))
			  {
				if ($row['password'] != $password) 
					{
					 $_Ret = 2;
					}
			   }
		    }
	        else
		    {
		     $_Ret = 3;
		    }
		 }
	 return($_Ret);
	}
?>
		
	
	