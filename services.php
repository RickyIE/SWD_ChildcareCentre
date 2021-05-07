<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'header.php' ?>
      <title>Activities</title>
   </head>
   <section class="activities-intro p-top">
      <div class="container flex center">
         <div class="intro-text">
            <h2 class="heading-2">KIDDIE CLUBHOUSE - Services</h2>
            <p>KIDDIE CLUBHOUSE offer multiple services.</p>
         </div>
      </div>
   </section>
   <!-- get activities from database -->
   <?php 
      // select data
      $query = "SELECT serviceid, servicetitle, servicedetail, imagepath, link FROM service";
      
      // add results to array for later    
      $result = @mysqli_query($db_connection, $query);
      $services = array();
      while ($row = mysqli_fetch_array($result)) {
        $services[] = array(  
          'serviceid' => $row['serviceid'],  
          'servicetitle' => $row['servicetitle'], 
          'servicedetail' => $row['servicedetail'],  
          'imagepath' => $row['imagepath'],  
          'link' => $row['link']
        ); 
      }
      ?>  
   <?php
      // loop array and create page
      for ($row = 0; $row < sizeof($services); $row++) { 
          if ($row % 2 == 0) { // if even
            ?>
   <section class="daily-activities p-top">
      <div class="container grid">
         <div>
            <img src="<?php echo $services[$row]['imagepath']; ?>" alt="" class="activity-image service-image">
         </div>
         <div class="activity-text">
            <h2 class="heading-2"><?php echo $services[$row]['servicetitle']; ?></h2>
            <p><?php echo $services[$row]['servicedetail']; ?></p>
         </div>
      </div>
   </section>
   <?php          
      } else {
        ?>
   <section class="daily-activities p-top">
      <div class="container grid">
         <div class="activity-text">
            <h2 class="heading-2"><?php echo $services[$row]['servicetitle']; ?></h2>
            <p><?php echo $services[$row]['servicedetail']; ?></p>
         </div>
         <div>
            <img src="<?php echo $services[$row]['imagepath']; ?>" alt="" class="activity-image service-image">
         </div>
      </div>
   </section>
   <?php 
      } 
      }    
      ?>  
   <?php include 'footer.html' ?>
   <div class="overlay hidden"></div>
   <script src="js/app.js"></script>
   </body>
</html>