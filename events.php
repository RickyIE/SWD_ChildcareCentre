<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'header.php' ?>
      <title>Events</title>
   </head>
   <body>
   <section class="activities-intro p-top">
      <div class="container flex center">
         <div class="intro-text">
            <h2 class="heading-2">KIDDIE CLUBHOUSE - Events</h2>
            <p>Our kids go on many events during the year. Below is a list of some of most recent adventures.</p>
         </div>
      </div>
   </section>
   <!-- get activities from database -->
   <?php 
      // select data
      $query = "SELECT eventid, eventtitle, eventdetail, starttime, endtime, imagepath FROM event";
      
      // add results to array for later    
      $result = @mysqli_query($db_connection, $query);
      $events = array();
      while ($row = mysqli_fetch_array($result)) {
        $events[] = array(  
          'eventid' => $row['eventid'],  
          'eventtitle' => $row['eventtitle'], 
          'eventdetail' => $row['eventdetail'],  
          'starttime' => $row['starttime'],  
          'endtime' => $row['endtime'],  
          'imagepath' => $row['imagepath']
        ); 
      }
      ?>  
   <?php
      // loop array and create page
      for ($row = 0; $row < sizeof($events); $row++) { 
          if ($row % 2 == 0) { // if even
            ?>
   <section id="<?php echo "event" . $events[$row]['eventid']; ?>" class="daily-activities p-top">
      <div class="container grid">
         <div>
            <img src="<?php echo $events[$row]['imagepath']; ?>" alt="" class="activity-image">
         </div>
         <div class="activity-text">
            <h2 class="heading-2"><?php echo $events[$row]['eventtitle']; ?></h2>
            <p><?php echo $events[$row]['eventdetail']; ?></p>
            <h4 class="heading-4"><?php $start_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[$row]['starttime'] ); $end_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[$row]['endtime'] ); echo $start_time->format('F j, Y, g:i a') . ' to ' . $end_time->format('g:i a');?></h4>
         </div>
      </div>
   </section>
   <?php          
      } else {
        ?>
   <section id="<?php echo "event" . $events[$row]['eventid']; ?>" class="daily-activities p-top">
      <div class="container grid">
         <div class="activity-text">
            <h2 class="heading-2"><?php echo $events[$row]['eventtitle']; ?></h2>
            <p><?php echo $events[$row]['eventdetail']; ?></p>
            <h4 class="heading-4"><?php $start_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[$row]['starttime'] ); $end_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[$row]['endtime'] ); echo $start_time->format('F j, Y, g:i a') . ' to ' . $end_time->format('g:i a');?></h4>
         </div>
         <div>
            <img src="<?php echo $events[$row]['imagepath']; ?>" alt="" class="activity-image">
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