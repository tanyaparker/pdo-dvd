<?php
require 'vendor/nesbot/carbon/src/Carbon/Carbon.php';
require 'Symfony/vendor/symfony/symfony/src/Symfony/Component/HttpFoundation/Request.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Process</title>
</head>

<body>
	<?php 
		$request = Request::createFromGlobals();
		echo $request; 
	?>
</body>

</html>
