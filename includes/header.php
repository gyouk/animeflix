<?php
require_once('includes/config.php');
require_once('includes/classes/PreviewProvider.php');
require_once('includes/classes/CategoryContainers.php');
require_once('includes/classes/Entity.php');
require_once('includes/classes/EntityProvider.php');
require_once('includes/classes/ErrorMessage.php');
require_once('includes/classes/SeasonProvider.php');
require_once('includes/classes/Season.php');
require_once('includes/classes/Video.php');


if (!isset( $_SESSION["userLoggedIn"] )) {
	header('Location: register.php');
}
$userLoggedIn = $_SESSION["userLoggedIn"]
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/style/style.css">
	<script src="https://kit.fontawesome.com/a6ac26d5dc.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="assets/js/script.js"></script>
	<title>Welcome to AnimeFlix</title>
</head>
<body>
    <div class="wrapper">
