<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'db.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

use Carbon\Carbon;
use ITP\Songs\SongQuery;
use ITP\Auth;

$session = new Session();
$session->start();
$username = $session->get('username');

var_dump($username);

if (empty($username)) {
	$session->getFlashBag()->add('error', 'Incorrect Credentials');

	$response = new RedirectResponse('login.php');
	//$response->send();
}
else {
	$session->getFlashBag()->add('success', 'You have successfully logged in!');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>

<body>
<?php 
	echo "Username: " . $session->get('username') . "<br />";
	echo "Email: " . $session->get('email') . "<br />";
	echo "Login Time: " . $session->get('timestamp') . "<br />";
	echo "<a href='logout.php'>Log Out</a>";

	$songQuery = new SongQuery($pdo);
	$songs = $songQuery
				->withArtist()
				->withGenre()
				->orderBy('title')
				->all();
	echo "<table>
			<tr>
				<td>Title</td>
				<td>Artist</td>
				<td>Genre</td>
				<td>Price</td>
			</tr>";

	foreach ($songs as $song) :
		echo "<tr>
				<td>$song->title</td>
				<td>$song->artist_name</td>
				<td>$song->genre</td>
				<td>$song->price</td>
			  </tr>";
	endforeach;

	echo "</table>";
?>


</body>

</html>
