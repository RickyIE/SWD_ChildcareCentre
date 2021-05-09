<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php'; ?>
  <title>Update Service</title>
</head>

<body>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
  
  $errors = array('serviceid' => '', 'servicetitle' => '', 'servicedetail' => '', 'imagepath' => '', 'link' => '', 'failure' => '');  

  // validate serviceid
  if (empty($_POST['serviceid-update']))
  {
      $errors['serviceid'] = 'serviceid missing!';
  } else {
      $serviceid = trim($_POST['serviceid-update']);
  }

  // validate servicetitle
  if (empty($_POST['servicetitle-update']))
  {
      $errors['servicetitle'] = 'servicetitle missing!';
  } else {
      $servicetitle = trim($_POST['servicetitle-update']);
  }

  // validate servicedetail
  if (empty($_POST['servicedetail-update']))
  {
      $errors['servicedetail'] = 'servicedetail missing!';
  } else {
      $servicedetail = trim($_POST['servicedetail-update']);
  }

  // validate imagepath
  if(isset($_FILES['imagepath-update'])) 
  {    
    $allowed = array ('image/jpeg', 'image/JPG', 'image/PNG', 'image/png', 'image/svg+xml', 'image/svg');
    // check size
    if($_FILES['imagepath-update']['size'] > 4194304){      
      $errors['imagepath'] = 'Error, file too large!';
    } else if (!in_array($_FILES['imagepath-update']['type'], $allowed)) { // check type
      $errors['imagepath'] = 'invalid file type!';
    } else { // try upload
      $uploaddir = 'img/services/'; // Setting the upload directory and file name...
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

  // validate link
  if (empty($_POST['link-update']))
  {
      $errors['link'] = 'link missing!';
  } else {
      $link = trim($_POST['link-update']);
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
    $query = "UPDATE service SET servicetitle = '$servicetitle', servicedetail = '$servicedetail', imagepath = '$imagepath', link = '$link' WHERE serviceid = '$serviceid'";
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
    $errors = array('serviceid' => '', 'servicetitle' => '', 'servicedetail' => '', 'imagepath' => '', 'link' => '', 'failures' => '');

      // get record id to be updated
      $service = $_GET['serviceid']; 
      // get record from database
      $query = "SELECT serviceid, servicetitle, servicedetail, imagepath, link FROM service WHERE serviceid = '$service'";
      $result = @mysqli_query($db_connection, $query);
      $service_detail = array();
      // store data in array
      while ($row = mysqli_fetch_array($result)) {
        $service_detail[] = array(  
          'serviceid' => $row['serviceid'],  
          'servicetitle' => $row['servicetitle'], 
          'servicedetail' => $row['servicedetail'], 
          'imagepath' => $row['imagepath'], 
          'link' => $row['link']
        ); 
      } 
      // save values to variables
      $serviceid = $service_detail[0]['serviceid'];
      $servicetitle = $service_detail[0]['servicetitle'];
      $servicedetail = $service_detail[0]['servicedetail'];
      $imagepath = $service_detail[0]['imagepath'];
      $link = $service_detail[0]['link'];
    }  
  ?> 

<section class="day-details">
  <div class="container">  
    <form enctype="multipart/form-data" method='post' action="" class="update-details-form">          
        <label for="serviceid-update">Service ID</label>
        <input type="number" id="serviceid-update" name="serviceid-update" placeholder="" value="<?php echo $serviceid; ?>" readonly>
        <label for="servicetitle-update">Title</label>
        <input type="text" id="servicetitle-update" name="servicetitle-update" placeholder="" value="<?php echo $servicetitle ?>">
        <div class='red-text'><?php if(isset($errors['servicetitle'])) { echo $errors['servicetitle']; } ?></div>   
        <label for="servicedetail-update">Detail</label>
        <textarea name="servicedetail-update" id="servicedetail-update" cols="30" rows="10"><?php if(isset($servicedetail)) { echo $servicedetail; } ?></textarea>
        <div class='red-text'><?php if(isset($errors['servicedetail'])) { echo $errors['servicedetail']; } ?></div>   
        <label for="imagepath-update">Image</label>
        <input type="file" name="imagepath-update" id="imagepath-update">
        <div class='red-text'><?php if(isset($errors['imagepath'])) { echo $errors['imagepath']; } ?></div>   
        <img src="<?php if(isset($imagepath)) { echo $imagepath; } ?>" alt="" class="activity-image service-image" width="200" height="200">
        <label for="">Link</label>
        <input type="text" id="link-update" name="link-update" placeholder="" value="<?php echo $link ?>">
        <div class='red-text'><?php if(isset($errors['link'])) { echo $errors['link']; } ?></div> 
        <button type="submit" class="btn btn-primary" >Update Details</button>
        <div class='red-text'><?php if(isset($errors['failure'])) { echo $errors['failure']; } ?></div> 
      </form>      
  </div>
</section>

<?php include 'footer.html'; ?>

  <div class="overlay hidden"></div>
  <script src="js/app.js"></script>
</body>

</html>