<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php'; ?>
  <title>New Service</title>
</head>

<body>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
  
  $errors = array('serviceid' => '', 'servicetitle' => '', 'servicedetail' => '', 'imagepath' => '', 'link' => '', 'failure' => '');  

  // validate servicetitle
  if (empty($_POST['servicetitle-new']))
  {
      $errors['servicetitle'] = 'servicetitle missing!';
  } else {
      $servicetitle = trim($_POST['servicetitle-new']);
  }

  // validate servicedetail
  if (empty($_POST['servicedetail-new']))
  {
      $errors['servicedetail'] = 'servicedetail missing!';
  } else {
      $servicedetail = trim($_POST['servicedetail-new']);
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
      $uploaddir = 'img/services/'; // Setting the upload directory and file name...
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

  // validate link
  if (empty($_POST['link-new']))
  {
      $errors['link'] = 'link missing!';
  } else {
      $link = trim($_POST['link-new']);
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
    $query = "INSERT INTO service (servicetitle, servicedetail, imagepath, link) VALUES ('$servicetitle', '$servicedetail','$imagepath', '$link')";

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
  <div class="container">  
    <form enctype="multipart/form-data" method='post' action="" class="update-details-form">
        <label for="servicetitle-new">Title</label>
        <input type="text" id="servicetitle-new" name="servicetitle-new" placeholder="" value="<?php if(isset($servicetitle)) { echo $servicetitle; } ?>">
        <div class='red-text'><?php if(isset($errors['servicetitle'])) { echo $errors['servicetitle']; } ?></div>   
        <label for="servicedetail-new">Detail</label>
        <textarea name="servicedetail-new" id="servicedetail-new" cols="30" rows="10"><?php if(isset($servicedetail)) { echo $servicedetail; } ?></textarea>
        <div class='red-text'><?php if(isset($errors['servicedetail'])) { echo $errors['servicedetail']; } ?></div>   
        <label for="imagepath-new">Image</label>
        <input type="file" name="imagepath-new" id="imagepath-new">
        <div class='red-text'><?php if(isset($errors['imagepath'])) { echo $errors['imagepath']; } ?></div> 
        <label for="">Link</label>
        <input type="text" id="link-new" name="link-new" placeholder="" value="<?php if(isset($link)) { echo $link; } ?>">
        <div class='red-text'><?php if(isset($errors['link'])) { echo $errors['link']; } ?></div> 
        <button type="submit" class="btn btn-primary" >Add Details</button>
        <div class='red-text'><?php if(isset($errors['failure'])) { echo $errors['failure']; } ?></div> 
      </form>      
  </div>
</section>

<?php include 'footer.html'; ?>

  <div class="overlay hidden"></div>
  <script src="js/app.js"></script>
</body>

</html>