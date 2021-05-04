<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="css/utilities.css">
  <link rel="stylesheet" href="css/style.css">
  <title>New Day Details</title>
</head>

<body>

<?php 
  require ('scripts/connect.php'); 
  // clear array and start validation again
  $errors = array('username' => '', 'password' => '', 'failure' => '');
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") {   

  session_start();

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
    $query = "SELECT username, password FROM user WHERE username='$username' AND isactive=true";
    $result = @mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) == 1)
    {      
      $row = mysqli_fetch_array($result);
      if (password_verify($password, $row['password']))
      {       
        /* The password is correct. */
        $_SESSION['user_id'] = $row['username'];
        $_SESSION['name'] = $row['firstName'].' '. $row['lastName'];       
        // go to home page
        header("Location: index.php");
        exit();        
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

  <!-- Navbar -->
  <div class="navbar" id="home">
    <div class="container flex">
      <figure><img class="logo" src="img/logo-01.svg" alt=""></figure>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#updates">Updates</a></li>
          <li><a href="#offers">Offers</a></li>
        </ul>
      </nav>

      <div class="nav-buttons">
        <button class="btn btn-primary btn-primary show-sign-up-modal">Sign Up</button>
        <button class="btn btn-primary btn-secondary show-log-in-modal">Log In</button>
      </div>

    </div>
  </div>
  <!-- End Navigation -->

<section class="login">
  <div class="container">  
  <form class="log-in-form" action='' method='POST'>
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<?php if (isset($username)) { echo $username; } ?>">
    <div class='red-text'><?php echo $errors['username']; ?></div>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="<?php if (isset($password)) { echo $password; } ?>">
    <div class='red-text'><?php echo $errors['password']; ?></div>

    <button class="btn btn-primary">Log In</button>
    <div class='red-text'><?php echo $errors['failure']; ?></div>
  </form>          
  </div>      
</section>

      <?php include 'footer.html' ?>

  <div class="overlay hidden"></div>
  <script src="js/app.js"></script>
</body>

</html>