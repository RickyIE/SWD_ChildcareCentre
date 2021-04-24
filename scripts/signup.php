<?php
session_start();
error_reporting(0);
// validate username / email
if (empty($_POST['username']))
{
    $errors[] = 'You forgot to enter user name.';
}
elseif(!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL))
{
    $errors[] = "Invalid username, please provide an email address.";
} else {
    $username = trim($_POST['username']);
}

// validate password
if (empty($_POST['password']))
{
    $errors[] = 'You forgot to enter password.';
}
elseif (strlen($_POST["password"]) <= 8) {
    $errors[] = "Your password must contain at least 8 characters!";
}
elseif (!preg_match("#[0-9]+#",$_POST['password'])) {
    $errors[] = "Your password must contain at least 1 Number!";
}
elseif (!preg_match("#[A-Z]+#",$_POST['password'])) {
    $errors[] = "Your password must contain at least 1 capital letter!";
}
elseif (!preg_match("#[a-z]+#",$_POST['password'])) {
    $errors[] = "Your password must contain at least 1 lowercase letter!";
} 
elseif ($_POST['password'] != $_POST['password_confirm']) {
    $errors[] = "Please check you've entered or confirmed your password!";
} else {
    $password = trim($_POST['password']);
}
// validate first name
if (empty($_POST['first_name']))
{ // check if value is empty
    $errors[] = 'Please provide a first name.'; // add error to array    
}
elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST['first_name']))
{
    $errors["first_name"] = "Invalid first name! use only letters and white space.";
} else {
    $first_name = trim($_POST['first_name']);
}
// validate last name
if (empty($_POST['last_name']))
{ // check if value is empty
    $errors[] = 'Please provide a last name.'; // add error to array    
}
elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST['last_name']))
{
    $errors[] = "Invalid last name! use only letters and white space.";
} else {
    $last_name = trim($_POST['last_name']);
}
// action
if (empty($errors))
{ // attempt signup         
    require ('connect.php');
    $query = "INSERT INTO user VALUES('$username', '$first_name', '$last_name', '$password', '2', true)";
    $result = @mysqli_query($db_connection, $query);
    if ($result)
    { 
        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row['username'];
        $_SESSION['name'] = $row['firstName'].' '. $row['lastName'];    
        
        echo '<h3>Yes! your signup was successful. You ar now logged in.</h3>';
        echo 'Session id:' . $_SESSION['user_id'] . '<br>';        
        echo 'Session name: ' . $_SESSION['name'] . '<br>' ;
        echo '<a href="logout.php">Logout</a>';  
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
