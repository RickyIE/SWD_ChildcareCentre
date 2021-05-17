

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php'; ?>
  <title>New Service</title>
</head>
<body>

<?php
// clear array and start validation again
$errors = array('username' => '', 'password' => '', 'failure' => '');
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty($_POST['username']))
    {
        $errors['username'] = 'You forgot to enter user name';
    }
    else
    {
        $username = trim($_POST['username']);
    }
    if (empty($_POST['password']))
    {
        $errors['password'] = 'You forgot to enter password';
    }
    else
    {
        $password = trim($_POST['password']);
    }

    // Evaluates array because it always has keyes, so never empty
    foreach($errors as $key => $value) {
        if ($value!=''){
            $emptycheck = 1;
            break;
        }
        else {
            $emptycheck = 0;
        }
    }

    // add record to database
    if (count(array_filter($errors)) == 0)
    {
        $query = "SELECT username, password, firstname, lastname, usertypeid FROM user WHERE username='$username' AND isactive=true";
        $result = @mysqli_query($db_connection, $query);
        if (mysqli_num_rows($result) == 1)
        {
            header("Location: https://www.meetalex.org/swd/index.php" , true , 302);
            exit();

            $row = mysqli_fetch_array($result);
            if (password_verify($password, $row['password']))
            {
                /* The password is correct. */
                $_SESSION['user_id'] = $row['username'];
                $_SESSION['name'] = $row['firstname'].' '. $row['lastname'];
                $_SESSION['accesslevel'] = $row['usertypeid'];
                // go to home page

                $websiteURLHardcoded = "Location: https://www.meetalex.org/swd/index.php";
                $websiteURL = strval("Location: https://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/index.php");
                $localPORT = strval("Location: index.php");
                $location = $_SERVER['HTTP_HOST'];
                $pattern = "/localhost/i";

                header($websiteURLHardcoded , true , 302);

//                if (preg_match($pattern, $location) === 1 ){ // if running on local machine redirect locally else redirect web
//
//                    header($localPORT , true , 303);
//
//
//                }else if(preg_match($pattern, $location) === 0) { // if not running locally set parameters for web
//                    header($websiteURL , true , 303);
//
//                }

                exit();
                //echo "<script>window.location.replace('$websiteURLHardcoded');</script>";




            } else {
                $errors['failure'] = 'Invalid username or password!';
            }
        }
        else
        {
            $errors['failure'] = 'Invalid username or password!';
        }
        mysqli_close($db_connection);
    }
}
?>

<section class="login">
  <div class="grid">  
    <div class="left-content">
      <figure>
        <img class="login-img" src="img/login-img-01.svg" alt="">
      </figure>
    </div>
    
    <div class="form login-form-card">
      <form class="log-in-form" action='' method='POST'>
      <label for="username">Username</label>
      <input type="text" name="username" id="username" value="<?php if (isset($username)) { echo $username; } ?>">
      <div class='red-text'><?php echo $errors['username']; ?></div>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="<?php if (isset($password)) { echo $password; } ?>">
      <div class='red-text'><?php echo $errors['password']; ?></div>

      <div class="flex">
        <button class="btn btn-primary">Log In</button>
        <div class='red-text'><?php echo $errors['failure']; ?></div>
      </div>
      </form>          
    </div> 
  </div>
</section>

      <?php include 'footer.html' ?>

  <div class="overlay hidden"></div>
  <script src="js/app.js"></script>
</body>

</html>