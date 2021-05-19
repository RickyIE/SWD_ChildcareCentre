<?php
ob_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session 2</title>
</head>
<body>

<div>This is Page 2</div>

<ul>
    <li><a href="session1.php">Page 1</a></li>
    <li><a href="session2.php">Page 2</a></li>
</ul>

<?php

session_start();

echo "Session user is = ".$_SESSION['user']."<br>";

echo "session_id()".session_id()."<br>";
echo "ini_get('session.cookie_domain');".ini_get('session.cookie_domain')."<br>";

?>

</body>
</html>

<?php
ob_end_flush()
?>