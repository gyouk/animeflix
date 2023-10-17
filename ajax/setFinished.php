<?php
require_once ("../includes/config.php");

if (isset($_POST["videoId"]) && isset($_POST["username"])) {
	$username = $_POST["username"];
	$videoID = $_POST["videoId"];


	$query = $connecting_db->prepare( "UPDATE videoProgress SET finished=1, progress=0
												WHERE username=:username AND videoId=:videoId");
	$query->bindValue(":username", $username);
	$query->bindValue(":videoId", $videoID);

	$query->execute();
} else {
	echo "No data found";
}
