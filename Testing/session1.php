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

echo "Session user is = ".$_SESSION['user']."<br>";
echo "\$host  = \$_SERVER['HTTP_HOST'] = ".$host  = $_SERVER['HTTP_HOST']."<br>";
echo "\$uri   = dirname(\$_SERVER['PHP_SELF'] = ".$uri   = dirname($_SERVER['PHP_SELF'])."<br>";
echo "\$uri   = rtrim(dirname(\$_SERVER['PHP_SELF']), '/\\') = ".$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."<br>";
echo  "\$_SERVER['HTTP_HOST'] \$_SERVER['REQUEST_URI'] = ".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']."<br>";
echo "\$newurl = 'https://www.example.com/subdirectory'. \$_SERVER['REQUEST_URI'];"."https://www.example.com/subdirectory = ". $_SERVER['REQUEST_URI']."<br>";
echo "header('Location: https://'. \$_SERVER['HTTP_HOST'] . '/new'); = ".  "Location: https://". $_SERVER['HTTP_HOST'] . "/new = "."<br>";
echo "Location: https://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/index.php"."<br>";
echo "session_id()".session_id()."<br>";
echo "ini_get('session.cookie_domain');".ini_get('session.cookie_domain')."<br>";


exit();

?>

</body>
</html>
