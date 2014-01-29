
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
    return $this->song_id;
	}
}

?>

$song = new Song($pdo);
$song->setTitle('Come Away With Me');
$song->setArtistId(2);
$song->setGenreId(3);
$song->setPrice('1.69');
$response = $song->save();