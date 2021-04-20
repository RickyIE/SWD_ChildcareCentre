<?php
session_start();
if (empty($_POST['username']))
{
    $errors[] = 'You forgot to enter user name';
}
else
{
    $user = trim($_POST['username']);
}
if (empty($_POST['password']))
{
    $errors[] = 'You forgot to enter password';
}
else
{
    $pass = trim($_POST['password']);
}

// action
if (empty($errors))
{ // attempt logon         
    require ('connect.php');
    $query = "SELECT * FROM user WHERE parentEmail='$user' AND password='$pass'";
    $result = @mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row['parentEmail'];
        $_SESSION['name'] = $row['firstName'].' '. $row['lastName'];    
        
        echo '<h3>Yes! your login was successful.</h3>';
        echo 'Session id:' . $_SESSION['user_id'] . '<br>';        
        echo 'Session name: ' . $_SESSION['name'] . '<br>' ;
        echo '<a href="logout.php">Logout</a>';        
    }
    else
    {
        echo "<h2>Error!</h2> <h3>The username and password are incorrect!</h3>";
    }
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
