<?php

$websiteURLHardcoded = "Location: https://www.meetalex.org/swd/index.php";
$websiteURL = strval("Location: https://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/indexTest.php");
$localPORT = strval("Location: indexTest.php");
$location = $_SERVER['HTTP_HOST'];
$pattern = "/localhost/i";

if (preg_match($pattern, $location) === 1 ){ // if running on local machine redirect locally else redirect web

    header($localPORT);

}else if(preg_match($pattern, $location) === 0) {

    header($websiteURL);

}

?>
