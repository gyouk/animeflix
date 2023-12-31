<?php
require_once ("../includes/config.php");

if (isset($_POST["videoId"]) && isset($_POST["username"])) {
	$username = $_POST["username"];
	$videoID = $_POST["videoId"];

	$query = $connecting_db->prepare( "SELECT * FROM videoProgress
												WHERE username=:username AND videoId=:videoId");
	$query->bindValue(":username", $username);
	$query->bindValue(":videoId", $videoID);
	$query->execute();

	if ($query->rowCount() == 0) {
		echo "Video";
		$query = $connecting_db->prepare("INSERT INTO videoProgress(username, videoId) 
												VALUES(:username, :videoId)");
		$query->bindValue(":username", $username);
		$query->bindValue(":videoId", $videoID);
		$query->execute();
	}
} else {
	echo "No data found";
}
