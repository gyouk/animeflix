<?php
require_once ("../includes/config.php");

if (isset($_POST["videoId"]) && isset($_POST["username"]) && isset($_POST["progress"])) {
	$username = $_POST["username"];
	$videoID = $_POST["videoId"];
	$progress = $_POST["progress"];

	$query = $connecting_db->prepare( "UPDATE videoProgress SET progress=:progress,
												dateModified=NOW() WHERE username=:username AND videoId=:videoId");
	$query->bindValue(":username", $username);
	$query->bindValue(":videoId", $videoID);
	$query->bindValue(":progress", $progress);
	$query->execute();
} else {
	echo "No data found";
}
