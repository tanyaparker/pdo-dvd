<?php

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$artist_name = $_GET['artist'];

$sql = "
  SELECT title, price, play_count, artist_name
  FROM songs
  INNER JOIN artists
  ON songs.artist_id = artists.id
  WHERE artist_name LIKE ?
  ORDER BY play_count DESC
";

$statement = $pdo->prepare($sql);

$like = '%'.$artist_name.'%';
$statement->bindParam(1, $like);
$statement->execute();
$songs = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<?php foreach ($songs as $song) : ?>
  <div class="song">
    <h3>
      <?php echo $song->title; ?> by <?php echo $song->artist_name; ?>
    </h3>
    <p>Play Count: <?php echo $song->play_count; ?></p>
    <p>Price: $<?php echo $song->price; ?></p>
  </div>
<?php endforeach; ?>