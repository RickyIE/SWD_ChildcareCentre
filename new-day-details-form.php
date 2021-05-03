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
  $errors = array('childname' => '', 'temperature' => '', 'breakfast' => '', 'lunch' => '', 'activities' => '');
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
    

    // validate childname
    if (empty($_POST['childname']))
    {
        $errors['childname'] = 'You forgot to select a child name!';
    } else {
        $childname = trim($_POST['childname']);
    }    

    // validate temperature
    if (empty($_POST['temperature-new']))
    {
        $errors['temperature'] = 'You forgot to enter a temperature.';
    } else {
        $temperature = trim($_POST['temperature-new']);
    }

    // validate breakfast
    if (empty($_POST['breakfast-new']))
    {
        $errors['breakfast'] = 'You forgot to enter a breakfast.';
    } else {
        $breakfast = trim($_POST['breakfast-new']);
    }

    // validate lunch
    if (empty($_POST['lunch-new']))
    {
        $errors['lunch'] = 'You forgot to enter a lunch.';
    } else {
        $lunch = trim($_POST['lunch-new']);
    }

    // validate activities
    if (empty($_POST['activities-new']))
    {
        $errors['activities'] = 'You forgot to enter an activity.';
    } else {
        $activityid = trim($_POST['activities-new']);
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
      $query = "INSERT INTO daily_record (childId, temperature, breakfast, lunch, activityId, created) VALUES('$childname', '$temperature', '$breakfast', '$lunch', '$activityid', curdate())";
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

  <!-- get children from database.. only select children that have no record for current day. -->
  <?php       
    $query = "SELECT childid, firstname, lastname FROM children WHERE childid NOT IN (SELECT childid FROM daily_record WHERE created = CURDATE())";
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
      <div class="custom-select">
        <select name="childname">            
          <?php
          if (isset($childname)) {
            for ($row = 0; $row < sizeof($children); $row++) { 
              if ($children[$row]['childid'] == $childname) {
            ?>   
            <!-- add selected child first of children -->
            <option class="custom-option" value="<?php echo $children[$row]['childid']; ?>"><?php echo $children[$row]['firstname'] . ' ' . $children[$row]['lastname']; ?></option>; 
            <?php  
              }
            } 
            for ($row = 0; $row < sizeof($children); $row++) { 
                if ($children[$row]['childid'] != $childname) {
              ?>   
              <!-- add rest of children -->
              <option class="custom-option" value="<?php echo $children[$row]['childid']; ?>"><?php echo $children[$row]['firstname'] . ' ' . $children[$row]['lastname']; ?></option>; 
              <?php  
                }
            }            
          } else { // print them all
            ?>
            <option class="custom-option" value="">-----------------</option>     
            <?php
            for ($row = 0; $row < sizeof($children); $row++) { 
              ?>   
              <option class="custom-option" value="<?php echo $children[$row]['childid']; ?>"><?php echo $children[$row]['firstname'] . ' ' . $children[$row]['lastname']; ?></option>; 
              <?php  
              } 
          }    
          ?>       
        </select>
        <div class='red-text'><?php echo $errors['childname']; ?></div>
      </div>
      <label for="temperature-new">Temperature</label>
      <input type="number" id="temperature-new" name="temperature-new" placeholder="" step=".01" value="<?php if(isset($temperature)) { echo $temperature; } ?>">
      <div class='red-text'><?php echo $errors['temperature']; ?></div>
      <label for="breakfast-new">Breakfast</label>
      <textarea name="breakfast-new" id="breakfast-new" cols="30" rows="10"><?php if(isset($breakfast)) { echo $breakfast; } ?></textarea>
      <div class='red-text'><?php echo $errors['breakfast']; ?></div>
      <label for="lunch-new">Lunch</label>
      <textarea name="lunch-new" id="lunch-new" cols="30" rows="10"><?php if(isset($lunch)) { echo $lunch; } ?></textarea>
      <div class='red-text'><?php echo $errors['lunch']; ?></div>
      <label for="">Activities</label>
      <div class="custom-select">
      <select name="activities-new">            
          <?php
          if (isset($activityid)) {
            for ($row = 0; $row < sizeof($activity); $row++) { 
              if ($activity[$row]['activityid'] == $activityid) {
            ?>   
            <!-- add selected activity first -->
            <option class="custom-option" value="<?php echo $activity[$row]['activityid']; ?>"><?php echo $activity[$row]['activitytitle']; ?></option>; 
            <?php  
              }
            } 
            for ($row = 0; $row < sizeof($activity); $row++) { 
                if ($activity[$row]['activityid'] != $activityid) {
              ?>   
              <!-- add rest of activities -->
              <option class="custom-option" value="<?php echo $activity[$row]['activityid']; ?>"><?php echo $activity[$row]['activitytitle']; ?></option>; 
              <?php  
                }
            }            
          } else { // print them all
            ?>
            <option class="custom-option" value="">-----------------</option>     
            <?php
            for ($row = 0; $row < sizeof($activity); $row++) { 
              ?>   
              <option class="custom-option" value="<?php echo $activity[$row]['activityid']; ?>"><?php echo $activity[$row]['activitytitle']; ?></option>; 
              <?php  
              } 
          }    
          ?>       
        </select>
      <div class='red-text'><?php echo $errors['activities']; ?></div>
      </div>
            <button class="btn btn-primary">Add Details</button>
          </form>      
      </div>
      
      </section>

      <?php include 'footer.html' ?>
      
  <div class="overlay hidden"></div>
  <script src="js/app.js"></script>
</body>

</html>