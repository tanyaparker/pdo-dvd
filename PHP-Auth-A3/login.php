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
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" method="post" action="login-process.php">
            <div class="form-group">
              <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Log in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <div class="jumbotron">
      <div class="container">
        <h1>Welcome!</h1>
        <p>Please log in to see your dashboard of songs.</p>
      </div>
    </div>

</body>
</html>




