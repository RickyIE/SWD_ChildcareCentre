<?php
// create an array to store errors
$errors = array();
// validate child name
if (empty($_GET['feeid']))
{
    $errors[] = 'No fee id found!';
} else {
    $fee = $_GET['feeid']; 
}

if (empty($errors))
{       
    require ('connect.php'); 
    $query = "UPDATE fee SET ispaid = true, paiddate = CURDATE() WHERE feeid = '$fee'";
    $result = @mysqli_query($db_connection, $query);
    if ($result)
    { 
        header("Location: ../registration-edit.php");
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
