<?php
require_once 'db.php';
require_once 'classes/ArtistQuery.php';
require_once 'classes/GenreQuery.php';
require_once 'classes/ArtistMenu.php';
require_once 'classes/GenreMenu.php';
include 'form.css';

$artistQuery = new ArtistQuery($pdo);
$artists = $artistQuery->getAll();

$genreQuery = new GenreQuery($pdo);
$genres = $genreQuery->getAll();

?>

<table>
<form method="post" action="add-song-process.php">
    <div>
        <tr>
            <td><font face="Helvetica"><b>Title:</b></font></td>
            <td><input type="text" name="title" /></td>
        </tr>
    </div>
    <div>
        <tr>
            <td><font face="Helvetica"><b>Artist:</b></font></td>
            <td><?php echo new ArtistMenu('artist', $artists) ?></td> 
        </tr>
    </div>
    <div>
        <tr>
            <td><font face="Helvetica"><b>Genre:</b></font></td>
            <td><?php echo new GenreMenu('genre', $genres) ?></td> 
        </tr>
    </div>
    <div>
        <tr>
            <td><font face="Helvetica"><b>Price:</b></font></td>
            <td><input type="text" name="price" /></td> 
        </tr>
    </div>
    <div>
        <tr>
            <td></td><td><input type="submit" value="Add Song" /></td>
        </tr>
    </div>
</form>
</table>




