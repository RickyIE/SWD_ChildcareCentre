<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php'; ?>
  <title>New Special Offer</title>
</head>

<body>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
  
  $errors = array('offerid' => '', 'offertitle' => '', 'offerdetail' => '', 'imagepath' => '', 'failure' => '');  

  // validate offertitle
  if (empty($_POST['offertitle-new']))
  {
      $errors['offertitle'] = 'offertitle missing!';
  } else {
      $offertitle = trim($_POST['offertitle-new']);
  }

  // validate offerdetail
  if (empty($_POST['offerdetail-new']))
  {
      $errors['offerdetail'] = 'offerdetail missing!';
  } else {
      $offerdetail = trim($_POST['offerdetail-new']);
  }

  // validate imagepath
  if(isset($_FILES['imagepath-new'])) 
  {    
    $allowed = array ('image/jpeg', 'image/JPG', 'image/PNG', 'image/png', 'image/svg+xml', 'image/svg');
    // check size
    if($_FILES['imagepath-new']['size'] > 4194304){      
      $errors['imagepath'] = 'Error, file too large!';
    } else if (!in_array($_FILES['imagepath-new']['type'], $allowed)) { // check type
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
    $query = "INSERT INTO special_offer (offertitle, offerdetail, imagepath) VALUES('$offertitle', '$offerdetail', '$imagepath')";
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
        <label for="offertitle-new">Title</label>
        <input type="text" id="offertitle-new" name="offertitle-new" placeholder="" value="<?php if(isset($offertitle)) { echo $offertitle; } ?>">
        <div class='red-text'><?php if(isset($errors['offertitle'])) { echo $errors['offertitle']; } ?></div>   
        <label for="offerdetail-new">Detail</label>
        <textarea name="offerdetail-new" id="offerdetail-new" cols="30" rows="10"><?php if(isset($offerdetail)) { echo $offerdetail; } ?></textarea>
        <div class='red-text'><?php if(isset($errors['offerdetail'])) { echo $errors['offerdetail']; } ?></div>   
        <label for="imagepath-new">Image</label>
        <input type="file" name="imagepath-new" id="imagepath-new">
        <div class='red-text'><?php if(isset($errors['imagepath'])) { echo $errors['imagepath']; } ?></div>
        <div class="flex">
          <button type="submit" class="btn btn-primary" >Add Offer</button>
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