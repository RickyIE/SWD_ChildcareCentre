<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php'; ?>
  <title>New Service</title>
</head>

<body>

<?php 
  // clear array and start validation again
  $errors = array('first_name' => '', 'last_name' => '', 'home_phone' => '', 'mobile_phone' => '', 'street' => '', 'town' => '', 'county' => '', 'country' => '', 'eircode' => '', 'username' => '', 'password' => '', 'password_confirm' => '');
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") {   

  // validate username / email
  if (empty($_POST['username']))
  {
      $errors['username'] = 'You forgot to enter user name.';
  }
  elseif(!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL))
  {
      $errors['username'] = "Invalid username, please provide an email address.";
  } else {
      $username = trim($_POST['username']);
  }
  
  // validate password
  if (empty($_POST['password']))
  {
      $errors['password'] = 'You forgot to enter password.';
  }
  elseif (strlen($_POST["password"]) <= 8) {
      $errors['password'] = "Your password must contain at least 8 characters!";
  }
  elseif (!preg_match("#[0-9]+#",$_POST['password'])) {
      $errors['password'] = "Your password must contain at least 1 Number!";
  }
  elseif (!preg_match("#[A-Z]+#",$_POST['password'])) {
      $errors['password'] = "Your password must contain at least 1 capital letter!";
  }
  elseif (!preg_match("#[a-z]+#",$_POST['password'])) {
      $errors['password'] = "Your password must contain at least 1 lowercase letter!";
  } 
  elseif ($_POST['password'] != $_POST['password_confirm']) {
      $errors['password_confirm'] = "Please check you've entered or confirmed your password!";
  } else {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  }

  // validate first name
  if (empty($_POST['first_name']))
  { // check if value is empty
      $errors['first_name'] = 'Please provide a first name.'; // add error to array    
  }
  elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST['first_name']))
  {
      $errors['first_name'] = "Invalid first name! use only letters and white space.";
  } else {
      $first_name = trim($_POST['first_name']);
  }

  // validate last name
  if (empty($_POST['last_name']))
  { // check if value is empty
      $errors['last_name'] = 'Please provide a last name.'; // add error to array    
  }
  elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST['last_name']))
  {
      $errors['last_name'] = "Invalid last name! use only letters and white space.";
  } else {
      $last_name = trim($_POST['last_name']);
  }

  // validate address
  if (empty($_POST['street']))
  { // check if value is empty
      $errors['street'] = 'Please provide a street address.'; // add error to array    
  } else {
      $street = trim($_POST['street']);
  }
  if (empty($_POST['town']))
  { // check if value is empty
      $errors['town'] = 'Please provide a city or town.'; // add error to array    
  } else {
      $town = trim($_POST['town']);
  }
  if (empty($_POST['county']))
  { // check if value is empty
      $errors['county'] = 'Please provide a county.'; // add error to array    
  } else {
      $county = trim($_POST['county']);
  }
  if (empty($_POST['country']))
  { // check if value is empty
      $errors['country'] = 'Please provide a country.'; // add error to array    
  } else {
      $country = trim($_POST['country']);
  }
  if (empty($_POST['eircode']))
  { // check if value is empty
      $errors['eircode'] = 'Please provide an eircode.'; // add error to array    
  } else {
      $eircode = trim($_POST['eircode']);
  }

  // validate phone
  if (empty($_POST['home_phone']))
  { // check if value is empty
      $errors['home_phone'] = 'Please provide a home phone number.'; // add error to array    
  } else {
      $home_phone = trim($_POST['home_phone']);
  }

   // validate phone
   if (empty($_POST['mobile_phone']))
   { // check if value is empty
       $errors['mobile_phone'] = 'Please provide a mobile phone number.'; // add error to array    
   } else {
       $mobile_phone = trim($_POST['mobile_phone']);
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
    $query1 = "INSERT INTO user VALUES('$username', '$first_name', '$last_name', '$password', '2', true)";
    $result1 = @mysqli_query($db_connection, $query1);

    // if the query ran successfully
    if ($result1)
    { 
      // set session variables
      $row = mysqli_fetch_array($result1);
      $_SESSION['user_id'] = $row['username'];
      $_SESSION['name'] = $row['firstName'].' '. $row['lastName'];   

      $_SESSION['accesslevel'] = $row['usertypeid'];


      // save address
      $query2 = "INSERT INTO address (username, street, town, county, country, eircode) VALUES('$username', '$street', '$town', '$county', '$country', '$eircode')";
      $result2 = @mysqli_query($db_connection, $query2);

      // save phone numbers
      $query3 = "INSERT INTO phone (username, phone) VALUES('$username', '$home_phone')";
      $result3 = @mysqli_query($db_connection, $query3);

      $query4 = "INSERT INTO phone (username, phone) VALUES('$username', '$mobile_phone')";
      $result4 = @mysqli_query($db_connection, $query4);

      // go to home page
      header("Location: index.php");
      exit();            
    } else {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit(); 
    }   
    mysqli_close($db_connection);
  }
}
?>

 
<section class="sign-up">
  <div class="grid">  
    <div class="left-content">
      <figure>
      <img class="log-img" src="img/login-img-01.svg" alt="">
    </figure>
    </div>
   <div class="form sign-up-form-card">
      <form class="sign-up-form" action='' method='POST'>
      <label for="first_name">First Name</label>
      <input type="text" name="first_name" id="first_name" value="<?php if (isset($first_name)) { echo $first_name; } ?>">
      <div class='red-text'><?php echo $errors['first_name']; ?></div>

      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" id="last_name" value="<?php if (isset($last_name)) { echo $last_name; } ?>">
      <div class='red-text'><?php echo $errors['last_name']; ?></div>

      <label for="home_phone">Home Phone</label>
      <input type="tel" name="home_phone" id="home_phone" value="<?php if (isset($home_phone)) { echo $home_phone; } ?>">
      <div class='red-text'><?php echo $errors['home_phone']; ?></div>

      <label for="mobile_phone">Mobile Phone</label>
      <input type="tel" name="mobile_phone" id="mobile_phone" value="<?php if (isset($mobile_phone)) { echo $mobile_phone; } ?>">
      <div class='red-text'><?php echo $errors['mobile_phone']; ?></div>

      <label for="address">Address</label>
      <input type="text" name="street" id="street" placeholder="Street Name" value="<?php if (isset($street)) { echo $street; } ?>">
      <div class='red-text'><?php echo $errors['street']; ?></div>
      <input type="text" name="town" id="town" placeholder="City / Town" value="<?php if (isset($town)) { echo $town; } ?>">
      <div class='red-text'><?php echo $errors['town']; ?></div>
      <input type="text" name="county" id="county" placeholder="County" value="<?php if (isset($county)) { echo $county; } ?>">
      <div class='red-text'><?php echo $errors['county']; ?></div>
      <input type="text" name="country" id="country" placeholder="Country" value="<?php if (isset($country)) { echo $country; } ?>">
      <div class='red-text'><?php echo $errors['country']; ?></div>
      <input type="text" name="eircode" id="eircode" placeholder="Eircode" value="<?php if (isset($eircode)) { echo $eircode; } ?>">     
      <div class='red-text'><?php echo $errors['eircode']; ?></div>

      <label for="username">Username</label>
      <input type="text" name="username" id="username" value="<?php if (isset($username)) { echo $username; } ?>">
      <div class='red-text'><?php echo $errors['username']; ?></div>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="<?php if (isset($password)) { echo $password; } ?>">
      <div class='red-text'><?php echo $errors['password']; ?></div>

      <label for="password_confirm">Confirm Password</label>
      <input type="password" name="password_confirm" id="password_confirm" value="<?php if (isset($password_confirm)) { echo $password_confirm; } ?>">
      <div class='red-text'><?php echo $errors['password_confirm']; ?></div>   

      <div class="flex">
        <button class="btn btn-primary sign-up-btn">Sign Up</button>
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