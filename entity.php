<?php
require_once ("includes/header.php");

if(!isset($_GET['id'])) {
	ErrorMessage::show("No ID passed into page");
}
$entityId = $_GET['id'];
$entity = new Entity($connecting_db, $entityId);

$preview = new PreviewProvider($connecting_db, $userLoggedIn);
echo $preview->createPreviewVideo( $entity);

$seasonProvider = new SeasonProvider($connecting_db, $userLogged);
echo $seasonProvider->create($entity);

$categoryContainers = new CategoryContainers($connecting_db, $userLogged);
echo $categoryContainers->showCategory($entity->getCategoryId(), "Tou might also like to:");


