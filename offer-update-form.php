<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php'; ?>
  <title>Update Special Offer</title>
</head>

<body>

<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
  
  $errors = array('offerid' => '', 'offertitle' => '', 'offerdetail' => '', 'imagepath' => '', 'link' => '', 'failure' => '');  

  // validate offerid
  if (empty($_POST['offerid-update']))
  {
      $errors['offerid'] = 'offerid missing!';
  } else {
      $offerid = trim($_POST['offerid-update']);
  }

  // validate offertitle
  if (empty($_POST['offertitle-update']))
  {
      $errors['offertitle'] = 'offertitle missing!';
  } else {
      $offertitle = trim($_POST['offertitle-update']);
  }

  // validate offerdetail
  if (empty($_POST['offerdetail-update']))
  {
      $errors['offerdetail'] = 'offerdetail missing!';
  } else {
      $offerdetail = trim($_POST['offerdetail-update']);
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
    $query = "UPDATE special_offer SET offertitle = '$offertitle', offerdetail = '$offerdetail', imagepath = '$imagepath', link = '$link' WHERE offerid = '$offerid'";
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
    $errors = array('offerid' => '', 'offertitle' => '', 'offerdetail' => '', 'imagepath' => '', 'link' => '', 'failure' => '');  

      // get record id to be updated
      $offer = $_GET['offerid']; 
      // get record from database
      $query = "SELECT offerid, offertitle, offerdetail, imagepath, link FROM special_offer WHERE offerid = '$offer'";
      $result = @mysqli_query($db_connection, $query);
      $offer_detail = array();
      // store data in array
      while ($row = mysqli_fetch_array($result)) {
        $offer_detail[] = array(  
          'offerid' => $row['offerid'],  
          'offertitle' => $row['offertitle'], 
          'offerdetail' => $row['offerdetail'], 
          'imagepath' => $row['imagepath'], 
          'link' => $row['link']
        ); 
      } 
      // save values to variables
      $offerid = $offer_detail[0]['offerid'];
      $offertitle = $offer_detail[0]['offertitle'];
      $offerdetail = $offer_detail[0]['offerdetail'];
      $imagepath = $offer_detail[0]['imagepath'];
      $link = $offer_detail[0]['link'];
    }  
  ?> 

<section class="day-details">
  <div class="container">  
    <form enctype="multipart/form-data" method='post' action="" class="update-details-form">          
        <label for="serviceid-update">Offfer ID</label>
        <input type="number" id="offerid-update" name="offerid-update" placeholder="" value="<?php echo $offerid; ?>" readonly>
        <label for="offertitle-update">Title</label>
        <input type="text" id="offertitle-update" name="offertitle-update" placeholder="" value="<?php echo $offertitle ?>">
        <div class='red-text'><?php if(isset($errors['offertitle'])) { echo $errors['offertitle']; } ?></div>   
        <label for="offerdetail-update">Detail</label>
        <textarea name="offerdetail-update" id="offerdetail-update" cols="30" rows="10"><?php if(isset($offerdetail)) { echo $offerdetail; } ?></textarea>
        <div class='red-text'><?php if(isset($errors['offerdetail'])) { echo $errors['offerdetail']; } ?></div>   
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