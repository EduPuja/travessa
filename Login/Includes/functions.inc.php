<?php

function emptySingupInputs($username, $password, $passwordRepeat)
{
	if(empty($username) || empty($password) || empty($passwordRepeat))
	{
		return true;
	}
	return false;
}

function passwordMatch($password, $passwordRepeat)
{
	if($password !== $passwordRepeat)
	{
		return true;
	}
	return false;
}
function createUser($connection, $password, $passwordRepeat)
{
	$sql = "INSERT INTO users (userName, userPwd) VALUE(?,?);";
	$stmt = mysqli_stmt_init($connection);

	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		header("Location: ../views/singup.php")
		exit();
	}
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt,"ss", $username, $hashPassword);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("Location: ../views/singup.php");
	exit();
}