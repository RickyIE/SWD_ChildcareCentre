<?php
session_start();
if (isset($_SESSION['user_id']))
{
    session_unset();
    session_destroy();
    echo '<h3>You Have Successfully Logged Out!.</h3>';
}
else
{
    echo "Already logged out!";
}
?>
