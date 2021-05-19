<?php

$websiteURL = strval("Location: https://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/index.php");

echo $websiteURL;


        $temp = "Location: https://new.example.com"."sub1.example.com";
        echo $temp;

?>
