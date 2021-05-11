<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'header.php' ?>
      <title>Activities</title>
   </head>
   <body>
   <section class="activities-intro p-top">
      <div class="container flex center">
         <div class="intro-text">
            <h2 class="heading-2">KIDDIE CLUBHOUSE - Activities</h2>
            <p>During a day in KIDDIE CLUBHOUSE, your child will be able to take part in loads of different activites. These activites will be recorded in your childs daily record.</p>
         </div>
      </div>
   </section>
   <!-- get activities from database -->
   <?php 
      // select data
      $query = "SELECT activityid, activitytitle, activitydetail, imagepath FROM activity";
      
      // add results to array for later    
      $result = @mysqli_query($db_connection, $query);
      $activities = array();
      while ($row = mysqli_fetch_array($result)) {
        $activities[] = array(  
          'activityid' => $row['activityid'],  
          'activitytitle' => $row['activitytitle'], 
          'activitydetail' => $row['activitydetail'],  
          'imagepath' => $row['imagepath']
        ); 
      }
      ?>  
   <?php
      // loop array and create page
      for ($row = 0; $row < sizeof($activities); $row++) { 
          if ($row % 2 == 0) { // if even
            ?>
   <section class="daily-activities p-top">
      <div class="container grid">
         <div>
            <img src="<?php echo $activities[$row]['imagepath']; ?>" alt="" class="activity-image">
         </div>
         <div class="activity-text">
            <h2 class="heading-2"><?php echo $activities[$row]['activitytitle']; ?></h2>
            <p><?php echo $activities[$row]['activitydetail']; ?></p>
         </div>
      </div>
   </section>
   <?php          
      } else {
        ?>
   <section class="daily-activities p-top">
      <div class="container grid">
         <div class="activity-text">
            <h2 class="heading-2"><?php echo $activities[$row]['activitytitle']; ?></h2>
            <p><?php echo $activities[$row]['activitydetail']; ?></p>
         </div>
         <div>
            <img src="<?php echo $activities[$row]['imagepath']; ?>" alt="" class="activity-image">
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