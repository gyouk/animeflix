<?php
ob_start(); // Turn on output buffering
session_start();

date_default_timezone_set( 'Europe/Vilnius' );

try {

	$connecting_db = new PDO("mysql:dbname=animeflix;host=localhost","root", "");
	$connecting_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
	exit('Connection error: ' . $e->getMessage());
}
