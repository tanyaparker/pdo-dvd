<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'db.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

use Carbon\Carbon;
use ITP\Auth;

$session = new Session();
$session->start();

$request = Request::createFromGlobals();
$username = $request->request->get('username');
$password = $request->request->get('password');

$auth = new Auth($pdo);
$login = $auth->attempt($username, $password);

if ($login) {
	$session->set('username', $username);	
	$session->set('password', $password);
	$session->set('loginTime', time());

	$session->getFlashBag()->add('success', 'You have successfully logged in!');

	$response = new RedirectResponse('dashboard.php');
	$response->send();
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
	<title>Login Process</title>
</head>

<body>
	TODO: session set email, convert time
</body>

</html>
