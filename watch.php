<?php
require_once ("includes/header.php");

if(!isset($_GET['id'])) {
	ErrorMessage::show("No ID passed into page");
}

$video = new Video( $connecting_db, $_GET['id']);
$video->incrementViews();

$video_id = $video->getId();
$video_title = $video->getTitle();
$video_links = $video->getFilePath();

?>

<div class="watchContainer">

    <div class="videoControls watchNav">
        <button onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
        <h1><?php echo $video_title;?></h1>
    </div>
	<video controls autoplay >
		<source src='<?php echo $video_links ;?>' type="video/mp4">
	</video>
</div>
<script>
    initVideo("<?php echo $video_id;?>", "<?php echo $userLoggedIn;?>");
</script>
