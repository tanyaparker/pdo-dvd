<?php

class GenreQuery {
  protected $pdo;
  protected $sql;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
    $this->sql = "SELECT * FROM genres";
  }

  public function orderByGenre()
  {
    $this->sql .= ' ORDER BY genre';
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

$genreQuery = new GenreQuery($pdo);
$genreQuery->orderByGenre();
$genres = $genreQuery->getAll();

?>