<?php
session_start();
if (isset($_SESSION['user_id']))
{
    session_unset();
    session_destroy();
    // go to home page
    header("Location: ../index.php");
    exit();   
}
else
{
    echo "Already logged out!";
}
?>
