<?php
require_once 'db.php';
require_once 'classes/ArtistQuery.php';
require_once 'classes/GenreQuery.php';
require_once 'classes/ArtistMenu.php';
require_once 'classes/GenreMenu.php';

$artistQuery = new ArtistQuery($pdo);
$artists = $artistQuery->getAll();

$genreQuery = new GenreQuery($pdo);
$genres = $genreQuery->getAll();

?>

<form method="post" action="add-song-process.php">
    <div>
        Title: <input type="text" name="title" />
    </div>
    <div>
        Artist: <?php echo new ArtistMenu('artist', $artists) ?>
    </div>
    <div>
        Genre: <?php echo new GenreMenu('genre', $genres) ?>
    </div>
    <div>
        Price: <input type="text" name="price" />
    </div>
    <div>
        <input type="submit" value="Add Song" />
    </div>
</form>