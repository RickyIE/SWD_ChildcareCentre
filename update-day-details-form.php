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
  <title>Update Day Details</title>
</head>

<body>

<?php 
  require ('scripts/connect.php'); 
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
  
    // clear array and start validation again
    $errors = array('recordid' => '', 'temperature' => '', 'breakfast' => '', 'lunch' => '', 'activities' => '');

    // validate recordid
    if (empty($_POST['recordid-update']))
    {
        $errors['recordid'] = 'recordid missing!';
    } else {
        $recordid = trim($_POST['recordid-update']);
    }

    // save name for later (if validation fails)
    $name = trim($_POST['name-update']);

    // validate temperature
    if (empty($_POST['temperature-update']))
    {
        $errors['temperature'] = 'You forgot to enter a temperature.';
    } else {
        $temperature = trim($_POST['temperature-update']);
    }

    // validate breakfast
    if (empty($_POST['breakfast-update']))
    {
        $errors['breakfast'] = 'You forgot to enter a breakfast.';
    } else {
        $breakfast = trim($_POST['breakfast-update']);
    }

    // validate lunch
    if (empty($_POST['lunch-update']))
    {
        $errors['lunch'] = 'You forgot to enter a lunch.';
    } else {
        $lunch = trim($_POST['lunch-update']);
    }

    // validate activities
    if (empty($_POST['activities-update']))
    {
        $errors['activities'] = 'You forgot to enter an activity.';
    } else {
        $activityid = trim($_POST['activities-update']);
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

    // update record in database
    if (count(array_filter($errors)) == 0)
    { 
      $query = "UPDATE daily_record SET temperature = '$temperature', breakfast = '$breakfast', lunch = '$lunch', activityId = '$activityid' WHERE recordid = '$recordid'";
      $result = @mysqli_query($db_connection, $query);

    

      // if the query ran successfully
      if ($result)
      { 
        // go to all day details page
        header("Location: day-details.php");
        exit();            
      } else {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit(); 
      }   
      mysqli_close($db_connection);
    }
}
?>

<?php

  if ($_SERVER['REQUEST_METHOD'] == "GET") {   

    // make sure array exists when page first loads
    $errors = array('recordid' => '', 'temperature' => '', 'breakfast' => '', 'lunch' => '', 'activities' => '');

      // get record id to be updated
      $record = $_GET['recordid']; 
      // get record from database
      $query = "SELECT dr.recordid, dr.childid, c.firstname, c.lastname, dr.temperature, dr.breakfast, dr.lunch, a.activityid, a.activitytitle FROM daily_record dr INNER JOIN children c on dr.childid = c.childid INNER JOIN activity a on dr.activityid = a.activityid WHERE dr.recordid = '$record'";
      $result = @mysqli_query($db_connection, $query);
      $daily_record = array();
      // store data in array
      while ($row = mysqli_fetch_array($result)) {
        $daily_record[] = array(  
          'recordid' => $row['recordid'],  
          'childid' => $row['childid'], 
          'firstname' => $row['firstname'], 
          'lastname' => $row['lastname'], 
          'temperature' => $row['temperature'], 
          'breakfast' => $row['breakfast'], 
          'lunch' => $row['lunch'], 
          'activityid' => $row['activityid'],
          'activitytitle' => $row['activitytitle']
        ); 
      } 
      // save values to variables
      $name = $daily_record[0]['firstname'] . ' ' . $daily_record[0]['lastname'];
      $recordid = $daily_record[0]['recordid'];
      $temperature = $daily_record[0]['temperature'];
      $breakfast = $daily_record[0]['breakfast'];
      $lunch = $daily_record[0]['lunch'];
      $activityid = $daily_record[0]['activityid'];
      $activities = $daily_record[0]['activitytitle'];
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

  <!-- Modals -->
  <div class="sign-up-modal">
    <button class="close-sign-up-modal">&times;</button>
    <h1>Sign Up</h1>
    <div class="form-card">
      <form class="sign-up-form" action='scripts\signup.php' method='POST'>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name">

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name">

        <label for="username">Username</label>
        <input type="text" name="username" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <label for="password_confirm">Confirm Password</label>
        <input type="password" name="password_confirm" id="password_confirm">

        <!-- might use these fields later, but commenting out for now.

          <label for="home-phone">Home Phone</label>
          <input type="tel" name="password" id="home-phone">

          <label for="address">Address</label>
          <textarea name="address" id="address" cols="30" rows="10"></textarea>

          -->

        <button class="btn btn-primary">Sign Up</button>
      </form>
    </div>
  </div>

  <div class="log-in-modal">
    <button class="close-log-in-modal">&times;</button>
    <h1>Log In</h1>
    <div class="form-card">
      <form class="log-in-form" action='scripts\login.php' method='POST'>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button class="btn btn-primary">Log In</button>
      </form>
    </div>
  </div>

  <!-- get children from database -->
  <?php       
    $query = "SELECT childid, firstname, lastname FROM children";
    $result = @mysqli_query($db_connection, $query);
    $children = array();
    while ($row = mysqli_fetch_array($result)) {
      $children[] = array(  
        'childid' => $row['childid'],  
        'firstname' => $row['firstname'], 
        'lastname' => $row['lastname']
      ); 
    }
  ?>

  <!-- get activities from database -->
  <?php       
    $query = "SELECT activityid, activitytitle FROM activity";
    $result = @mysqli_query($db_connection, $query);
    $activity = array();
    while ($row = mysqli_fetch_array($result)) {
      $activity[] = array(  
        'activityid' => $row['activityid'],  
        'activitytitle' => $row['activitytitle']
      ); 
    }
  ?>

<section class="day-details">
  <div class="container">  
    <form method='post' action="" class="update-details-form">     
        <label for="">Record ID</label>
        <input type="number" id="recordid-update" name="recordid-update" placeholder="" value="<?php echo $recordid; ?>" readonly>
        <label for="name-update">Name</label>
        <input type="text" id="name-update" name="name-update" placeholder="" value="<?php echo $name ?>" readonly>
        <label for="temperature-update">Temperature</label>
        <input type="number" id="temperature-update" name="temperature-update" placeholder="" step=".01" value="<?php if(isset($temperature)) { echo $temperature; } ?>">
        <div class='red-text'><?php echo $errors['temperature']; ?></div>
        <label for="breakfast-update">Breakfast</label>
        <textarea name="breakfast-update" id="breakfast-update" cols="30" rows="10"><?php if(isset($breakfast)) { echo $breakfast; } ?></textarea>
        <div class='red-text'><?php echo $errors['breakfast']; ?></div>
        <label for="lunch-update">Lunch</label>
        <textarea name="lunch-update" id="lunch-update" cols="30" rows="10"><?php if(isset($lunch)) { echo $lunch; } ?></textarea>
        <div class='red-text'><?php echo $errors['lunch']; ?></div>
        <label for="">Activities</label>
        <div class="custom-select">
          <select name="activities-update">
          <!-- add selected activity -->
            <?php
                for ($row = 0; $row < sizeof($activity); $row++) { 
                  if ($activity[$row]['activityid'] == $activityid) {
                ?>   
                <!-- add rest of activities -->
                <option class="custom-option" value="<?php echo $activity[$row]['activityid']; ?>"><?php echo $activity[$row]['activitytitle']; ?></option>; 
                <?php  
                  }
              }      
            ?>   
            <?php
              for ($row = 0; $row < sizeof($activity); $row++) { 
                if ($activity[$row]['activityid'] != $activityid) {
              ?>   
              <!-- add rest of activities -->
              <option class="custom-option" value="<?php echo $activity[$row]['activityid']; ?>"><?php echo $activity[$row]['activitytitle']; ?></option>; 
              <?php  
                }
            }      
          ?>   
          </select>
          <div class='red-text'><?php echo $errors['activities']; ?></div>
        </div>
        <button class="btn btn-primary">Update Details</button>
      </form>      
  </div>
</section>

<?php include 'footer.html' ?>

  <div class="overlay hidden"></div>
  <script src="js/app.js"></script>
</body>

</html>