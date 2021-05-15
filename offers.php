<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'header.php' ?>
      <title>Special Offers</title>
   </head>
   <body>
   <section class="activities-intro p-top">
      <div class="container flex center">
         <div class="intro-text">
            <h2 class="heading-2">KIDDIE CLUBHOUSE - Special Offers</h2>
            <p>KIDDIE CLUBHOUSE have a wide range of special offers for you to choose from.</p>
         </div>
      </div>
   </section>
   <!-- get services from database -->
   <?php 
      // select data
      $query = "SELECT offerid, offertitle, offerdetail, imagepath FROM special_offer";
      
      // add results to array for later    
      $result = @mysqli_query($db_connection, $query);
      $offers = array();
      while ($row = mysqli_fetch_array($result)) {
        $offers[] = array(  
          'offerid' => $row['offerid'],  
          'offertitle' => $row['offertitle'], 
          'offerdetail' => $row['offerdetail'],  
          'imagepath' => $row['imagepath']
        ); 
      }
      ?>  
   <?php
      // loop array and create page
      for ($row = 0; $row < sizeof($offers); $row++) { 
          if ($row % 2 == 0) { // if even
            ?>
   <section id="<?php echo "offer" . $offers[$row]['offerid']; ?>" class="daily-activities p-top">
      <div class="container grid">
         <div>
            <img src="<?php echo $offers[$row]['imagepath']; ?>" alt="" class="activity-image service-image" data-aos="slide-left">
         </div>
         <div class="activity-text">
            <h2 class="heading-2"><?php echo $offers[$row]['offertitle']; ?></h2>
            <p><?php echo $offers[$row]['offerdetail']; ?></p>
         </div>
      </div>
   </section>
   <?php          
      } else {
        ?>
   <section id="<?php echo "offer" . $offers[$row]['offerid']; ?>" class="daily-activities p-top">
      <div class="container grid">
         <div class="activity-text">
            <h2 class="heading-2"><?php echo $offers[$row]['offertitle']; ?></h2>
            <p><?php echo $offers[$row]['offerdetail']; ?></p>
         </div>
         <div>
            <img data-aos="slide-right" src="<?php echo $offers[$row]['imagepath']; ?>" alt="" class="activity-image service-image">
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