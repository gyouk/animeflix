<?php

class SeasonProvider {
	private $connecting_db, $username;

	public function __construct($connecting_db, $username)
	{
		$this->connecting_db = $connecting_db;
		$this->username = $username;
	}

	public function create($entity){
	$seasons = $entity->getSeasons();

	if (sizeof($seasons) == 0) {
		return;
	}
	$seasonsHtml ='';
	foreach ($seasons as $season) {
		$seasonNumber =  $season->getSeasonNumber();

		$videosHtml = "";

		foreach ($season->getVideos() as $video) {
			$videosHtml .= $this->createVideoSquare($video);
		}

		$seasonsHtml .= "<div class= 'season'>
		<h3> Season $seasonNumber</h3>
		<div class='videos'>
		$videosHtml
</div>
		</div>";
	}
	return $seasonsHtml;

	}

	private function createVideoSquare($video) {
		$id = $video->getId();
		$thumbnail = $video->getThumbnail();
		$name = $video->getTitle();
		$description = $video->getDescription();
		$episodeNumber = $video->getEpisodeNumber();
		$hasSeen = $video->hasSeen($this->username) ? "<i class=' fa-solid fa-circle-check seen '></i>" : "";
		var_dump($video->hasSeen($this->username));
		var_dump($hasSeen);
		return "<a href='watch.php?id=$id'>
					<div class='episodeContainer'>
						<div class='contents'>
						
							<img src='$thumbnail' alt='thumbnail'>
							
							<div class='videoInfo'>
								<h4>$episodeNumber. $name</h4>
								<span>$description</span>
							</div>
						
							$hasSeen
							
						</div>
					</div>
				</a>";
	}
}
