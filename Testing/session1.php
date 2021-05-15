<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session 1</title>
</head>
<body>

<div>This is Page 1</div>

<ul>
    <li><a href="session1.php">Page 1</a></li>
    <li><a href="session2.php">Page 2</a></li>
</ul>

<?php

session_start();

$_SESSION['user'] = 'Alex';
echo $_SESSION['user'];
echo $host  = $_SERVER['HTTP_HOST'];
echo $uri   = dirname($_SERVER['PHP_SELF']);
echo $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

exit();

?>

</body>
</html>
