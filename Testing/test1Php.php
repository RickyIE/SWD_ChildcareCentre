<?php

$result = ($_POST);

print_r($result['firstName']);




$myfile = fopen("logs.txt", "a") or die("Unable to open file!");
fwrite($myfile, "\n". $result['firstName']);
fwrite($myfile, "\n". $result['firstName']);
fclose($myfile);

?>
