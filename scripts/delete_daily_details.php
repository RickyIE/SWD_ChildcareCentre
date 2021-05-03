<?php

// create an array to store errors
$errors = array();
// validate child name
if (empty($_GET['recordid']))
{
    $errors[] = 'No record id found!';
} else {
    $record = $_GET['recordid']; 
}

if (empty($errors))
{       
    require ('connect.php'); 
    $query = "DELETE FROM daily_record WHERE recordid = '$record'";
    $result = @mysqli_query($db_connection, $query);
    if ($result)
    { 
        header("Location: ../day-details.php");
        exit();
    }
    else
    {
        echo "<h2>Error!</h2>" ;
    }
    mysqli_close($db_connection);
}
else
{ // else print each error.
    echo "<h2>Error!</h2><h3>The following error(s) occurred:</h3>";
    foreach ($errors as $msg)
    {
        echo "- $msg <br/>";
    }
}
?>
