<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php'; ?>
  <title>Update Event</title>
</head>

<body>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
  
  $errors = array('eventid' => '', 'eventtitle' => '', 'eventdetail' => '', 'starttime' => '', 'endtime' => '', 'imagepath' => '', 'failure' => '');  

  // validate eventid
  if (empty($_POST['eventid-update']))
  {
      $errors['eventid'] = 'eventid missing!';
  } else {
      $eventid = trim($_POST['eventid-update']);
  }

  // validate eventtitle
  if (empty($_POST['eventtitle-update']))
  {
      $errors['eventtitle'] = 'event title missing!';
  } else {
      $eventtitle = trim($_POST['eventtitle-update']);
  }

  // validate eventdetail
  if (empty($_POST['eventdetail-update']))
  {
      $errors['eventdetail'] = 'eventdetail missing!';
  } else {
      $eventdetail = trim($_POST['eventdetail-update']);
  }

  // validate starttime
  if (empty($_POST['starttime-update']))
  {
      $errors['starttime'] = 'starttime missing!';
  } else {
      $starttime = trim($_POST['starttime-update']);
  }

  // validate endtime
  if (empty($_POST['endtime-update']))
  {
      $errors['endtime'] = 'endtime missing!';
  } else {
      $endtime = trim($_POST['endtime-update']);
  }

  // validate imagepath
  if(isset($_FILES['imagepath-update'])) 
  {    
    // list allow extentions
    $allowed = array ('jpeg', 'JPG', 'jpg', 'PNG', 'png', 'svg+xml', 'svg');
    // get file info
    $info = new SplFileInfo($_FILES['imagepath-update']['name']);
    // get extention for file
    $extension=$info->getExtension();
    // check size
    if($_FILES['imagepath-update']['size'] > 4194304){      
      $errors['imagepath'] = 'Error, file too large!';
    } else if (!in_array($extension, $allowed)) { // check type
      $errors['imagepath'] = 'invalid file type!';
    } else { // try upload
      $uploaddir = 'img/events/'; // Setting the upload directory and file name...
      $uploadfile = $uploaddir . basename($_FILES['imagepath-update']['name']);
      if (move_uploaded_file($_FILES['imagepath-update']['tmp_name'], $uploadfile)){
        $imagepath = $uploadfile; // save path to variable    
      } else {
        $errors['imagepath'] = 'Possible file upload error/attack!';
      }
    }    
  } else {
    $imagepath = 'error';
    $errors['imagepath'] = 'No file found!';
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
    $query = "UPDATE event SET eventtitle = '$eventtitle', eventdetail = '$eventdetail', starttime = '$starttime', endtime = '$endtime', imagepath = '$imagepath' WHERE eventid = '$eventid'";
    $result = @mysqli_query($db_connection, $query);    

      // if the query ran successfully
      if ($result)
      { 
        // go to all index edit page
        header("Location: index-edit.php");
        exit();            
      } else {
        $errors['failure'] = 'Error updating database! ' . mysqli_error($db_connection);
      }   
      mysqli_close($db_connection);
    }
  }
?>

<?php

  if ($_SERVER['REQUEST_METHOD'] == "GET") {   

    // make sure array exists when page first loads
    $errors = array('eventid' => '', 'eventtitle' => '', 'eventdetail' => '', 'starttime' => '', 'endtime' => '', 'imagepath' => '', 'failure' => ''); 

      // get record id to be updated
      $event = $_GET['eventid']; 
      // get record from database
      $query = "SELECT eventid, eventtitle, eventdetail, DATE_FORMAT(starttime, '%Y-%m-%dT%H:%i') AS starttime, DATE_FORMAT(endtime, '%Y-%m-%dT%H:%i') AS endtime, imagepath FROM event WHERE eventid = '$event'";
      $result = @mysqli_query($db_connection, $query);
      $event_detail = array();
      // store data in array
      while ($row = mysqli_fetch_array($result)) {
        $event_detail[] = array(  
          'eventid' => $row['eventid'],  
          'eventtitle' => $row['eventtitle'], 
          'eventdetail' => $row['eventdetail'],  
          'starttime' => $row['starttime'],  
          'endtime' => $row['endtime'],  
          'imagepath' => $row['imagepath']
        ); 
      } 
      // save values to variables
      $eventid = $event_detail[0]['eventid'];
      $eventtitle = $event_detail[0]['eventtitle'];
      $eventdetail = $event_detail[0]['eventdetail'];
      $starttime = $event_detail[0]['starttime'];
      $endtime = $event_detail[0]['endtime'];
      $imagepath = $event_detail[0]['imagepath'];
    }  
  ?> 

<section class="day-details">
<div class="grid"> 
      <div class="left-content">
        <figure><img src="img/cog-01.svg" alt=""></figure>
      </div>
    <form enctype="multipart/form-data" method='post' action="" class="update-details-form">          
        <label for="serviceid-update">Event ID</label>
        <input type="number" id="eventid-update" name="eventid-update" placeholder="" value="<?php echo $eventid; ?>" readonly>
        <label for="eventtitle-update">Title</label>
        <input type="text" id="eventtitle-update" name="eventtitle-update" placeholder="" value="<?php echo $eventtitle ?>">
        <div class='red-text'><?php if(isset($errors['eventtitle'])) { echo $errors['eventtitle']; } ?></div>   
        <label for="eventdetail-update">Detail</label>
        <textarea name="eventdetail-update" id="eventdetail-update" cols="30" rows="10"><?php if(isset($eventdetail)) { echo $eventdetail; } ?></textarea>
        <div class='red-text'><?php if(isset($errors['eventdetail'])) { echo $errors['eventdetail']; } ?></div>   
        <label for="starttime-update">Start</label>
        <input type="datetime-local" id="starttime-update" name="starttime-update" placeholder="" value="<?php echo $starttime ?>">
        <div class='red-text'><?php if(isset($errors['starttime'])) { echo $errors['starttime']; } ?></div> 
        <label for="endtime-update">End</label>
        <input type="datetime-local" id="endtime-update" name="endtime-update" placeholder="" value="<?php echo $endtime ?>">
        <div class='red-text'><?php if(isset($errors['endtime'])) { echo $errors['endtime']; } ?></div> 
        <label for="imagepath-update">Image</label>       
        <input type="file" name="imagepath-update" id="imagepath-update">
        <div class='red-text'><?php if(isset($errors['imagepath'])) { echo $errors['imagepath']; } ?></div>  
        <div class="flex">
          <button type="submit" class="btn btn-primary" >Update Event</button>
          <div class='red-text'><?php if(isset($errors['failure'])) { echo $errors['failure']; } ?></div> 
        </div> 
      </form>      
  </div>
</section>

<?php include 'footer.html'; ?>

  <div class="overlay hidden"></div>
  <script src="js/app.js"></script>
</body>

</html>