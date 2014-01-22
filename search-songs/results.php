<style>

.gradientBox{ 
height: 200px;
width: 400px; 
padding: 20px;
background-color: white; 

/* outer shadows */
-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);

/* rounded corners */
-webkit-border-radius: 12px;
-moz-border-radius: 7px; 
border-radius: 7px;

/* gradients */
background: -webkit-gradient(linear, left top, left bottom, 
color-stop(0%, white), color-stop(15%, white), color-stop(100%, #d5d5f3)); 
background: -moz-linear-gradient(top, white 0%, white 55%, #d5d5f3 130%); 
}

</style>

<?php

$host = 'itp460.usc.edu';
$dbname = 'dvd';
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

//conditional welcome statement for # dvds
$num_dvds = $statement->rowCount();
if($num_dvds==0) {
	echo "We're sorry. There are no DVDs to match your query. Please <a href='search.php'>search</a> again.";
	exit();
}

if($num_dvds==1) {
	echo "We found $num_dvds dvd that matched your search for '$dvd_title':\n";	
}
else {
	echo "We found $num_dvds dvds that matched your search for '$dvd_title':\n";
}

?>

<?php foreach ($dvds as $dvd) : ?>
  <div class="gradientBox">
    <h3>
      <font face="verdana">
        <?php echo $dvd->title; ?>
      </font>
    </h3>
    <table>
    	<tr><td><b>Rating:</b></td><td><?php echo $dvd->rating; ?></td></tr>
    	<tr><td><b>Genre:</b></td><td><?php echo $dvd->genre; ?></td></tr>
    	<tr><td><b>Format:</b></td><td><?php echo $dvd->format; ?></td></tr>
	</table>
  </div>
<?php endforeach; ?>