
<?php 

require_once('db.php');

class Song {

  public $pdo;
  public $sql;

	public $title;
  public $artist_id;
  public $genre_id;
  public $song_id;
  public $price;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

	public function save() {
    $this->sql = "INSERT INTO songs (title, artist_id, genre_id, price)
                  VALUES ('$this->title', $this->artist_id, $this->genre_id, $this->price)";

    $statement = $this->pdo->prepare($this->sql);
    return $statement->execute();
	}

	public function setTitle($title) {
    $this->title = $title;
	}

	public function setArtistId($artist_id) {
    $this->artist_id = $artist_id;  
	}

	public function setGenreId($genre_id) {
    $this->genre_id = $genre_id;
	}

	public function setPrice($price) {
    $this->price = $price;
	}

	public function getTitle() {
    return $this->title;
	}

	public function getId() {
    $this->song_id = $this->pdo->lastInsertId();
    return $this->song_id;
	}
}

?>