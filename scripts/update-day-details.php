<?php 
    // require connection file
    require ('connect.php');

    // create an array to store errors
    $errors = array();

    // validate recordid
    if (empty($_POST['recordid-update']))
    {
        $errors[] = 'recordid missing!';
    } else {
        $recordid = trim($_POST['recordid-update']);
    }

    // validate temperature
    if (empty($_POST['temperature-update']))
    {
        $errors[] = 'You forgot to enter a temperature.';
    } else {
        $temperature = trim($_POST['temperature-update']);
    }

    // validate breakfast
    if (empty($_POST['breakfast-update']))
    {
        $errors[] = 'You forgot to enter a breakfast.';
    } else {
        $breakfast = trim($_POST['breakfast-update']);
    }

    // validate lunch
    if (empty($_POST['lunch-update']))
    {
        $errors[] = 'You forgot to enter a lunch.';
    } else {
        $lunch = trim($_POST['lunch-update']);
    }

    // validate activities
    if (empty($_POST['activities-update']))
    {
        $errors[] = 'You forgot to enter an activity.';
    } else {
        $activities = trim($_POST['activities-update']);
    }

    // update record in database
    if (empty($errors))
    { 
        $query = "UPDATE daily_record SET temperature = '$temperature', breakfast = '$breakfast', lunch = '$lunch', activityId = '$activities' WHERE recordid = '$recordid'";
        $result = @mysqli_query($db_connection, $query);

        // if the query ran successfully
        if ($result)
        { 
            // go to all day details page
            header("Location: ../day-details.php");
            exit();  
        }        
        mysqli_close($db_connection);
    }
    else
    {   
        // go back to form
        header("Location: ../update-day-details-form.php");
        exit();
    }
?>