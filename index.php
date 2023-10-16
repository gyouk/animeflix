<?php
require_once('includes/header.php');


$preview = new PreviewProvider($connecting_db, $userLoggedIn);
echo $preview->createPreviewVideo( null);

$preview = new CategoryContainers($connecting_db, $userLoggedIn);
echo $preview->showAllCategories();
