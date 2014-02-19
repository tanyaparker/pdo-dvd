<?php

require_once('../../../db.php');

class SongQuery {
  protected $pdo;
  protected $sql;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
    $this->sql = "SELECT * FROM dvds";
  }

  public function orderByName()
  {
    $this->sql .= ' ORDER BY title';
  }

  public function getAll()
  {
    $statement = $this->pdo->prepare($this->sql);
    $statement->execute();
    return $statement->fetchAll();
  }

}

?>