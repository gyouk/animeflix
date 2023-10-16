<?php
 class PreviewProvider {
	 private $connecting_db, $username;
	 public function __construct($connecting_db, $username) {
		$this->connecting_db = $connecting_db;
		$this->username = $username;
	 }

	 public function createPreviewVideo($entity){
		 if ($entity == null) {
			 $entity = $this->getRandomEntity();
		 }

		 $id = $entity->getId();
		 $name = $entity->getName();
		 $preview = $entity->getPreview();
		 $thumbnail = $entity->getThumbnail();

		 //todo: add sub-title

		return "<div class='previewContainer'>
 
		            <img src='$thumbnail' class='previewImage' hidden alt='img'>
		            
		            <video autoplay muted class='previewVideo' onended='previewEnded()' >
		            <source src='$preview' type='video/mp4'>
					</video>
		            
		            <div class='previewOverlay'>
		                <div class='mainDetails' >
		                 <h3>$name</h3>
		                 <div class='buttons'>
		                 	<button><i class='fa-solid fa-play'></i> Play</button>
		                 	<button onclick='volumeToggle(this)'> <i class='fa-solid fa-volume-xmark'></i></button>
		                 </div>
		                 
						</div>
		            </div>
		             </div>";


	 }

	 public function createEntityPreviewSquare($entity) {
		 $id = $entity->getId();
		 $thumbnail = $entity->getThumbnail();
		 $name = $entity->getName();

		 return "<a href='entity.php?id=$id'>
					<div class='previewContainer small'>
						<img src='$thumbnail' title='$name\' alt='img'>
					</div>
				</a>";

	 }

	 private function getRandomEntity (){

		 $entity = EntityProvider::getEntities($this->connecting_db, null, 1);
		 return $entity[0];

	 }

 }
