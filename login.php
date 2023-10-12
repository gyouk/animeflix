<?php
require_once('includes/config.php');
require_once('includes/classes/FormSanitizer.php');
require_once('includes/classes/Constants.php');
require_once('includes/classes/Account.php');

$account = new Account($connecting_db);

if (isset($_POST["submitButton"])) {

	$username = FormSanitizer::sanitizeFormUsername($_POST["username"]);

	$password = FormSanitizer::sanitizeFormPassword($_POST["password"]);


	$success = $account->login($username,$password);

	if ($success) {
		//store session
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}
}
function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/style/style.css">
	<title>Welcome to AnimeFlix</title>
</head>
<body>
<div class="signInContainer">
	<div class="column">

		<div class="header">
			<img src="assets/images/logo.png" title="AnimeFlix" alt="sitelogo">
			<h3>Sign In</h3>
			<span>to continue to AnimeFlix</span>
		</div>

		<form method="POST">
            <?php echo $account->getError(Constants::$loginFailed)?>
			<input type="text" name="username" id="" placeholder="UserName" value="<?php getInputValue('username')?>" required>

			<input type="password" name="password" id="" placeholder="Password" required>

			<input type="submit" name="submitButton" value="Submit">
		</form>

		<a href="register.php" class="signInMassege">Need an account? Sign up here!</a>
	</div>
</div>

</body>
</html>
