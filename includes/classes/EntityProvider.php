<?php

class EntityProvider {

	private $connecting_db, $username;

	public static function getEntities($connecting_db, $categoryId, $limit){
		$sql = "SELECT * FROM entities ";
		if ($categoryId != null){
			$sql .= "WHERE categoryId=:categoryId ";
		};

		$sql .= "ORDER BY RAND() LIMIT :limit";

		$query = $connecting_db->prepare($sql);

		if ($categoryId != null){
			$query->bindValue(':categoryId', $categoryId);
		};

		$query->bindValue(':limit', $limit, PDO::PARAM_INT);
		$query->execute();

		$result = array();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$result[] = new Entity($connecting_db, $row);
		}
		return $result;
	}

}
