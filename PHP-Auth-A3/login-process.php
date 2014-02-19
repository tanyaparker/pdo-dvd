<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'db.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->start();

if($session->get('username'))
	echo "yes";
else
	echo "no";

$request = Request::createFromGlobals();
$username = $request->request->get('username');
$password = $request->request->get('password');

$session->set('username', $username);
$session->set('password', $password);
$session->set('loginTime', time());

echo $session->get('username');
echo '<br />';
echo $session->get('loginTime');

//echo $session->getFlashBag()->set('statusMessage', 'Thanks!');

//var_dump($session->getFlashBag()->get('statusMessage'));

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Process</title>
</head>

<body>
</body>

</html>
