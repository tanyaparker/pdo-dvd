<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->start();

include 'form.css';

foreach ($session->getFlashBag()->get('error', array()) as $message) {
    echo '<div class="flash-error">'.$message.'</div>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
</head>

<body>
<table>
<form method="post" action="login-process.php">
    <div>
        <tr>
            <td><font face="Helvetica"><b>Username:</b></font></td>
            <td><input type="text" name="username" /></td>
        </tr>
    </div>
    <div>
        <tr>
            <td><font face="Helvetica"><b>Password:</b></font></td>
            <td><input type="password" name="password" /></td> 
        </tr>
    </div>
    <div>
        <tr>
            <td></td><td><input type="submit" value="Log In" /></td>
        </tr>
    </div>
</form>
</table>
</body>
</html>




