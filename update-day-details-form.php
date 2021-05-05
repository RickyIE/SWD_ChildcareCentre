<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php' ?>
  <title>Day Details Update</title>
</head>

<body>

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