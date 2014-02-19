<?php
include 'form.css';
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
            <td><input type="text" name="password" /></td> 
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




