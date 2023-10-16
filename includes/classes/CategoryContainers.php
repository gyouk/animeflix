<?php

class CategoryContainers
{
	private $connecting_db, $username;

	public function __construct($connecting_db, $username)
	{
		$this->connecting_db = $connecting_db;
		$this->username = $username;
	}

	public function showAllCategories() {
		$query = $this->connecting_db->prepare("SELECT * FROM categories");
		$query->execute();

		$html = "<div class='previewCategories'>";
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$html .= $this->getCategoryHtml($row, null, true, true);
		}
		return $html . "</div>";
	}

	public function showCategory($categoryId, $title = null) {
		$query = $this->connecting_db->prepare("SELECT * FROM categories WHERE id=:id");
		$query->bindValue(':id', $categoryId);
		$query->execute();

		$html = "<div class='previewCategories noScroll'>";
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$html .= $this->getCategoryHtml($row, $title, true, true);
		}
		return $html . "</div>";
	}

	private function getCategoryHtml($sqlData, $title,$tvShows,$movies){

		$categoryId = $sqlData["id"];
		$title = $title == null ? $sqlData["name"] : $title;

		if ($tvShows && $movies){
			$entities = EntityProvider::getEntities($this->connecting_db, $categoryId, 30);
		}
		elseif ($tvShows){
//			$entities = EntityProvider::getEntities($this->connecting_db, $categoryId, 30);
		}else{
//			$entities = EntityProvider::getEntities($this->connecting_db, $categoryId, 30);
		}
		if (sizeof($entities)==0){
			return;
		}

		$entitiesHtml = "";
		$previewProvider = new PreviewProvider($this->connecting_db, $this->username);
		foreach ($entities as $entity){
			$entitiesHtml .= $previewProvider->createEntityPreviewSquare($entity);
		}

		return "<div class='category'>
					<a href='category.php?id=$categoryId'>
						<h3>$title</h3>
					</a>
					<div class='entities'>
						$entitiesHtml
					</div>
				</div>";

	}
}
