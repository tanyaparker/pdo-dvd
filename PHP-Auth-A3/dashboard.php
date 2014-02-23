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

if (empty($username)) {
	$session->getFlashBag()->add('error', 'Incorrect Credentials');

	$response = new RedirectResponse('login.php');
	$response->send();
}
else {
	$session->getFlashBag()->add('success', 'You have successfully logged in!');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>

	<link href="../css/bootstrap.css" rel="stylesheet">
</head>

<body>

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php">ITP 499 Authentication</a>
        </div>
        <div class="navbar-header navbar-right">
          <a href="logout.php" role="button" class="btn btn-info">Log Out</a>
        </div>
      </div>
    </div>

    <div class="container">
    	<table align="right" style="margin-top: 60px;">
       	  <tr>
       	  	<td><b>Username:</b></td>
       	  	<td><?php echo $session->get('username'); ?></td>
       	  </tr>
       	  <tr>
       	  	<td><b>Email:</b></td>
       	  	<td><?php echo $session->get('email'); ?></td>
       	  </tr>
       	  <tr>
       	  	<td><b>Last Login:</b></td>
       	  	<td><?php echo Carbon::createFromTimeStamp($session->get('loginTime'))->diffForHumans(); ?></td>
       	  </tr>
       	</table>	
    </div>

<?php 
	$songQuery = new SongQuery($pdo);
	$songs = $songQuery
				->withArtist()
				->withGenre()
				->orderBy('title')
				->all();
?>
<div class="container" style="margin-top: 50px;">
	<div class="row" style="font-size: 30px;">
		<div class="col-md-3">
			<b>Title</b>
		</div>
		<div class="col-md-3">
			<b>Artist</b>
		</div>
		<div class="col-md-3">
			<b>Genre</b>
		</div>
		<div class="col-md-3">
			<b>Price</b>
		</div>
	</div>

<?php foreach ($songs as $song) : ?>
	<div class='row'>
		<div class='col-md-3'>
			<?php echo $song->title ?>
		</div>
		<div class='col-md-3'>
			<?php echo $song->artist_name ?>
		</div>
		<div class='col-md-3'>
			<?php echo $song->genre ?>
		</div>
		<div class='col-md-3'>
			<?php echo $song->price ?>
		</div>
	</div>
<?php endforeach; ?>
</div>

</body>

</html>
