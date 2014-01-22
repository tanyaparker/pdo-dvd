<?php

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$dvd_title = $_GET['title'];

$sql = "
  SELECT title, rating, genre, format
  FROM dvd_titles
  INNER JOIN ratings
  ON dvd_titles.rating_id = ratings.id
  INNER JOIN genres
  ON dvd_titles.genre_id = genres.id
  INNER JOIN formats
  ON dvd_titles.format_id = formats.id
  WHERE title LIKE ?
  ORDER BY title ASC
";

$statement = $pdo->prepare($sql);

$like = '%'.$dvd_title.'%';
$statement->bindParam(1, $like);
$statement->execute();
$dvds = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<?php foreach ($dvds as $dvd) : ?>
  <div class="dvd">
    <h3>
      <?php echo $dvd->title; ?> by <?php echo $dvd->title; ?>
    </h3>
    <p>Rating: <?php echo $dvd->rating; ?></p>
    <p>Genre: $<?php echo $dvd->genre; ?></p>
    <p>Format: $<?php echo $dvd->format; ?></p>
  </div>
<?php endforeach; ?>