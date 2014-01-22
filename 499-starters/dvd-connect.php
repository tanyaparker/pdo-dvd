<?php 

$con = mysqli_connect('itp460.usc.edu', 'student', 'ttrojan', 'dvd');
$results = mysqli_query($con, 'SELECT * FROM genres');

while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	echo $row['genre'];
	echo '<br />';
}