<?php

$websiteURL = strval("Location: https://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/index.php");
$localPORT = strval("Location: index.php");
$location = $_SERVER['HTTP_HOST'];
$pattern = "/localhost/i";

if (preg_match($pattern, $location) === 1 ){ // if running on local machine redirect locally else redirect web


    header($localPORT);

}else{

    header("Location: https://www.google.com/");

}

?>
