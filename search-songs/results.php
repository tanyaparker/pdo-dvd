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
$songs = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<?php foreach ($songs as $song) : ?>
  <div class="song">
    <h3>
      <?php echo $song->title; ?> by <?php echo $song->dvd_title; ?>
    </h3>
    <p>Play Count: <?php echo $song->play_count; ?></p>
    <p>Price: $<?php echo $song->price; ?></p>
  </div>
<?php endforeach; ?>