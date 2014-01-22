<?php

$host 	= 'itp460.usc.edu';
$dbname = 'music';
$user 	= 'student';
$pass 	= 'ttrojan';

$artist = $_GET['artist']; //$_REQUEST

$pdo 	= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$sql	= "SELECT title, price, play_count
			FROM songs
			INNER JOIN artists
			ON songs.artist_id = artists.id 
			WHERE artist_name = '$artist'
			ORDER BY play_count DESC
			";

$statement = $pdo->prepare($sql);
$statement->execute();
$songs = $statement->fetchAll(PDO::FETCH_OBJ);

var_dump($songs);

?>

<?php foreach($songs as $song) : ?>
	<h3>
		<?php echo $song->title ?>
		by
		<?php echo $song->artist_name ?>
	</h3>
	<p>Play Count: <?php echo $song->play_count ?></p>
	<p>$<?php echo $song->price ?></p>
<?php endforeach; ?>