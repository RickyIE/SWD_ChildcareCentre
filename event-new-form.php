<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php'; ?>
  <title>New Event</title>
</head>

<body>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
  
  $errors = array('eventid' => '', 'eventtitle' => '', 'eventdetail' => '', 'starttime' => '', 'endtime' => '', 'imagepath' => '', 'failure' => '');  

  // validate eventtitle
  if (empty($_POST['eventtitle-new']))
  {
      $errors['eventtitle'] = 'event title missing!';
  } else {
      $eventtitle = trim($_POST['eventtitle-new']);
  }

  // validate eventdetail
  if (empty($_POST['eventdetail-new']))
  {
      $errors['eventdetail'] = 'eventdetail missing!';
  } else {
      $eventdetail = trim($_POST['eventdetail-new']);
  }

  // validate starttime
  if (empty($_POST['starttime-new']))
  {
      $errors['starttime'] = 'starttime missing!';
  } else {
      $starttime = trim($_POST['starttime-new']);
  }

  // validate endtime
  if (empty($_POST['endtime-new']))
  {
      $errors['endtime'] = 'endtime missing!';
  } else {
      $endtime = trim($_POST['endtime-new']);
  }

  // validate imagepath
  if(isset($_FILES['imagepath-new'])) 
  {    
    // list allow extentions
    $allowed = array ('jpeg', 'JPG', 'jpg', 'PNG', 'png', 'svg+xml', 'svg');
    // get file info
    $info = new SplFileInfo($_FILES['imagepath-new']['name']);
    // get extention for file
    $extension=$info->getExtension();
    // check size
    if($_FILES['imagepath-new']['size'] > 4194304){      
      $errors['imagepath'] = 'Error, file too large!';
    } else if (!in_array($extension, $allowed)) { // check type
      $errors['imagepath'] = 'invalid file type!';
    } else { // try upload
      $uploaddir = 'img/events/'; // Setting the upload directory and file name...
      $uploadfile = $uploaddir . basename($_FILES['imagepath-new']['name']);
      if (move_uploaded_file($_FILES['imagepath-new']['tmp_name'], $uploadfile)){
        $imagepath = $uploadfile; // save path to variable    
      } else {
        $errors['imagepath'] = 'Possible file upload error/attack!';
      }
    }    
  } else {
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
    $query = "INSERT INTO event (eventtitle, eventdetail, starttime, endtime, imagepath) VALUES('$eventtitle', '$eventdetail', '$starttime', '$endtime', '$imagepath')";
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



<section class="day-details">
  <div class="grid"> 
      <div class="left-content">
        <figure><img src="img/cog-01.svg" alt=""></figure>
      </div>
    <form enctype="multipart/form-data" method='post' action="" class="update-details-form"> 
        <label for="eventtitle-new">Title</label>
        <input type="text" id="eventtitle-new" name="eventtitle-new" placeholder="" value="<?php if(isset($eventtitle)) { echo $eventtitle; } ?>">
        <div class='red-text'><?php if(isset($errors['eventtitle'])) { echo $errors['eventtitle']; } ?></div>   
        <label for="eventdetail-new">Detail</label>
        <textarea name="eventdetail-new" id="eventdetail-new" cols="30" rows="10"><?php if(isset($eventdetail)) { echo $eventdetail; } ?></textarea>
        <div class='red-text'><?php if(isset($errors['eventdetail'])) { echo $errors['eventdetail']; } ?></div>  
        <label for="starttime-new">Start</label>
        <input type="datetime-local" id="starttime-new" name="starttime-new" placeholder="" value="<?php if(isset($starttime)) { echo $starttime; } ?>">
        <div class='red-text'><?php if(isset($errors['starttime'])) { echo $errors['starttime']; } ?></div> 
        <label for="endtime-new">End</label>
        <input type="datetime-local" id="endtime-new" name="endtime-new" placeholder="" value="<?php if(isset($endtime)) { echo $endtime; } ?>">
        <div class='red-text'><?php if(isset($errors['endtime'])) { echo $errors['endtime']; } ?></div> 
        <label for="imagepath-new">Image</label>       
        <input type="file" name="imagepath-new" id="imagepath-new">
        <div class='red-text'><?php if(isset($errors['imagepath'])) { echo $errors['imagepath']; } ?></div> 
        <div class="flex">
          <button type="submit" class="btn btn-primary" >Add Event</button>
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