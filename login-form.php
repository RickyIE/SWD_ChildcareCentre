

<!DOCTYPE html>
<html lang="en">

<head>
  <title>New Service</title>
</head>
<body>

<?php
// clear array and start validation again
$errors = array('username' => '', 'password' => '', 'failure' => '');
?>

<?php

                /* The password is correct. */
                $_SESSION['user_id'] = 'username';
                $_SESSION['name'] = 'lastname';
                $_SESSION['accesslevel'] = 'usertypeid';
                // go to home page

                $websiteURLHardcoded = "Location: https://www.meetalex.org/swd/index.php";
                $localPORTHardcode = "Location: index.php";
                $websiteURL = strval("Location: https://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/index.php");
                $localPORT = strval("Location: index.php");
                $location = $_SERVER['HTTP_HOST'];
                $pattern = "/localhost/i";

                header($websiteURLHardcoded , true , 302);


                exit();
                //echo "<script>window.location.replace('$websiteURLHardcoded');</script>";
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