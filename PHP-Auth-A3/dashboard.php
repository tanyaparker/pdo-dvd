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

$request = Request::createFromGlobals();
$username = $request->request->get('username');
$password = $request->request->get('password');

$auth = new Auth($pdo);
$login = $auth->attempt($username, $password);

if ($login) {

}
else {
	$session->getFlashBag()->add('error', 'Incorrect Credentials');

	$response = new RedirectResponse('login.php');
	$response->send();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>

<body>
<?php 
	echo $session->get('username'); 
	echo $session->get('email'); 
	echo $session->get('timestamp'); 
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
				<td>$song->artist</td>
				<td>$song->genre</td>
				<td>$song->price</td>
			  </tr>"
	endforeach;

	echo "</table>";
?>


</body>

</html>
