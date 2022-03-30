<?php

	if(isset($_POST ["registerSubmit"]))
	{
		require_once "dbh.inc.php";
		require_once "functions.inc.php";

		$username = mysqli_real_escape_string($connection, $_POST["username"]);
		$password = mysqli_real_escape_string($connection, $_POST["password"]);
		$passwordRepeat = mysqli_real_escape_string($connection, $_POST["passwordRepeat"]);
		if(emptySignupInputs($username,$password,$passwordRepeat) !== false)
		{
			header("Location: ../views/singup.php");
			exit();
		}
		if(passwordMatch($password,$passwordRepeat) !== false)
		{
			header("Location: ../views/singup.php");
			exit();
		}

		createUser($connection, $username, $password);
	}else{
		header("Location: ../views/singup.php")
	}
?>