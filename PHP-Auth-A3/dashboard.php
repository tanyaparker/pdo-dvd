<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'db.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

use Carbon\Carbon;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>

<body>
	<table>
		<tr>
			<td>Title</td>
			<td>Artist</td>
			<td>Genre</td>
			<td>Price</td>
		</tr>
	</table>
</body>

</html>