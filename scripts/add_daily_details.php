<?php
    // create an array to store errors
    $errors = array();
    // validate child name
    if (empty($_POST['childname']))
    {
        $errors[] = 'You forgot to pick a child.';
    } else {
        $childname = trim($_POST['childname']);
    }

    // validate temperature
    if (empty($_POST['temperature']))
    {
        $errors[] = 'You forgot to enter a temperature.';
    } else {
        $temperature = trim($_POST['temperature']);
    }

    // validate breakfast
    if (empty($_POST['breakfast']))
    {
        $errors[] = 'You forgot to enter a breakfast.';
    } else {
        $breakfast = trim($_POST['breakfast']);
    }

    // validate lunch
    if (empty($_POST['lunch']))
    {
        $errors[] = 'You forgot to enter a lunch.';
    } else {
        $lunch = trim($_POST['lunch']);
    }

    // validate activities
    if (empty($_POST['activities']))
    {
        $errors[] = 'You forgot to enter an activity.';
    } else {
        $activities = trim($_POST['activities']);
    }



if (empty($errors))
{       
    require ('connect.php'); 
    $query = "INSERT INTO daily_record (childId, temperature, breakfast, lunch, activityId, created) VALUES('$childname', '$temperature', '$breakfast', '$lunch', '$activities', curdate())";
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
