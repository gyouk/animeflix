<?php
require_once ("../includes/config.php");

if (isset($_POST["videoId"]) && isset($_POST["username"])) {
	$username = $_POST["username"];
	$videoID = $_POST["videoId"];


	$query = $connecting_db->prepare( "SELECT progress FROM videoProgress
												WHERE username=:username AND videoId=:videoId");
	$query->bindValue(":username", $username);
	$query->bindValue(":videoId", $videoID);

	$query->execute();

	echo $query->fetchColumn();
} else {
	echo "No data found";
}
