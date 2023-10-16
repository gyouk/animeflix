<?php

class Entity {

	private $connecting_db, $sqlData;
 public function __construct($connecting_db, $input) {
	$this->connecting_db = $connecting_db;

	if(is_array($input)){
		$this->sqlData = $input;
	}
	else{
		$query = $this->connecting_db->prepare("SELECT * FROM entities WHERE id=:id");
		$query->bindValue(':id', $input);
		$query->execute();

		$this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
	}
 }

 public function getId(){
	return $this->sqlData['id'];
 }
 public function getName(){
	return $this->sqlData['name'];
 }
 public function getThumbnail(){
	return $this->sqlData['thumbnail'];
 }
 public function getPreview(){
	return $this->sqlData['preview'];
 }
 public function getCategoryId(){
	return $this->sqlData['categoryId'];
 }
 public function getSeasons(){
	 $query = $this->connecting_db->prepare("SELECT * FROM videos WHERE entityId=:id
												AND isMovie=0 ORDER BY season, episode ASC");
	 $query->bindValue(':id', $this->getId());
	 $query->execute();

	 $seasons = array();
	 $videos = array();
	 $currentSeason = null;

	 while ($row = $query->fetch(PDO::FETCH_ASSOC)){
		 if ($currentSeason !== null && $row['season'] != $currentSeason){
			 $seasons[] = new Season($currentSeason, $videos);
			 $videos = array();
		 }

		 $currentSeason = $row['season'];
		 $videos[] = new Video($this->connecting_db, $row);
	 }

	 if (sizeof($videos) != 0 ){
		 $seasons[] = new Season($currentSeason, $videos);
	 }
	 return $seasons;
 }
}
