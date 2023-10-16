<?php

class Video {

	private $connecting_db, $sqlData, $entity;
	public function __construct($connecting_db, $input) {
		$this->connecting_db = $connecting_db;

		if(is_array($input)){
			$this->sqlData = $input;
		}
		else{
			$query = $this->connecting_db->prepare("SELECT * FROM videos WHERE id=:id");
			$query->bindValue(':id', $input);
			$query->execute();

			$this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
		}

		$this->entity = new  Entity($connecting_db, $this->sqlData['entityId']);
	}
	public function getId(){
		return $this->sqlData['id'];
	}
	public function getTitle(){
		return $this->sqlData['title'];
	}
	public function getDescription(){
		return $this->sqlData['description'];
	}
	public function getFilePath(){
		return $this->sqlData['filePath'];
	}
	public function getThumbnail(){
		return $this->entity->getThumbnail();
	}
	public function getEpisodeNumber(){
		return $this->sqlData['episode'];
	}

	public function incrementViews(){
		$query = $this->connecting_db->prepare("UPDATE videos SET views=views+1 WHERE id=:id");
		$query->bindValue(':id', $this->getId());
		$query->execute();
	}
}
