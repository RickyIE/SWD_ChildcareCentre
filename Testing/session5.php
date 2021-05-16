<?php

$websiteURL = strval("Location: https://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/index.php");

echo $websiteURL;

?>
