<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="text-align:center;">

<h1 style="color:green;">
    GeeksforGeeks
</h1>

<h4>
    How to call PHP function
    on the click of a Button ?
</h4>

<?php
if(array_key_exists('button1', $_POST)) {
    button1();
}
else if(array_key_exists('button2', $_POST)) {
    button2();
}
function button1() {
    echo "This is Button1 that is selected";
}
function button2() {
    echo "This is Button2 that is selected";
}
?>


</body>
</html>