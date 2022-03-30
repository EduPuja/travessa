<?php include_once "../components/header.php"?>

<from action="../includes/singup.inc.php" method = "POST">
	Username : <input type="text" name="username">
	Password : <input type="password" name="password">
	Repeat password : <input type="password" name="passwordRepeat">
	<input type="submit" name="registerSubmit"/>

</from>

<?php include_once "../components/footer.php"?>