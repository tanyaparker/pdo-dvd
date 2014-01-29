<?php

class ArtistQuery {
  protected $pdo;
  protected $sql;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
    $this->sql = "SELECT * FROM artists";
  }

  public function orderByName()
  {
    $this->sql .= ' ORDER BY artist_name';
  }

  public function getAll()
  {
    $statement = $this->pdo->prepare($this->sql);
    $statement->execute();
    return $statement->fetchAll();
  }

}

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$artistQuery = new ArtistQuery($pdo);
$artistQuery->orderByName();
$artists = $artistQuery->getAll();

?>