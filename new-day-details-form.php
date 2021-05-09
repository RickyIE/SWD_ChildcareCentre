<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php' ?>
  <title>Day Details Add</title>
</head>

<body>

<?php    
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
    <div class="grid"> 
      <div class="left-content">
        <figure><img src="img/cog-01.svg" alt=""></figure>
      </div>
      
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
  <script src="js/app.js"></script>
</body>

</html>