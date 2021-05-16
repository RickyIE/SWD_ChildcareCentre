  <!DOCTYPE html>
  <html lang="en">

  <head>
  <?php

  header("Location: https://www.google.com/");
  include 'header.php' ?>
  <title>Home</title>
</head>  


    <!-- Showcase Area -->
    <section class="showcase">
      <div class="container grid">
        <div class="showcase-text">
          <h2 class="heading-1">Happy childhood memories start here.</h2>
          <p>With over 25 locations around the country, make sure your child gets the best start possible in one our
            top
            rated daycare centres. Register to secure your childs place today. Its as easy as ABC.</p>
        </div>
        <!-- End showcase Text -->

        <div class="showcase-image">
          <img src="img/showcase-bg-2-01.svg" alt="">
        </div>
        <!-- End showcase image -->
      </div>
      <!-- End Container -->
    </section>

    <!-- get services from database. Only ever use 3 services. -->
    <?php 
      $query = "SELECT serviceid, serviceTitle, serviceDetail, imagePath FROM service ORDER BY serviceid DESC limit 3";
      $result = @mysqli_query($db_connection, $query);

      $services = array();

      while ($row = mysqli_fetch_array($result)) {
        $services[] = array(  
          'serviceid' => $row['serviceid'],  
          'serviceTitle' => $row['serviceTitle'],  
          'serviceDetail' => $row['serviceDetail'], 
          'imagePath' => $row['imagePath']
        ); 
      }
    ?>

    <section class="services p-top" id="services">
      <div class="container">
        <h2 class="heading-2
        center">We strive to create a comforting
          learning experience where children will learn and interact in harmony. Here you can see some of the services we
          provide to make sure your child has a great stay with us.
        </h2>
        <div class="flex center">
        <?php for ($row = 0; $row < sizeof($services); $row++) { 
          ?>
          <div data-aos="slide-right">
            <a href="<?php echo "services.php#service" . $services[$row]['serviceid']; ?>">
              <figure><img class="service-img" src="<?php echo $services[$row]['imagePath']; ?>" alt=""></figure>
              <h3 class="heading-3"><?php echo $services[$row]['serviceTitle']?></h3>
              <p class="service-detail"><?php echo $services[$row]['serviceDetail']?></p>
            </a>  
          </div>              
          <?php
            }        
          ?>        
        </div>
      </div>
    </section>

    <!-- get events from database. only take the latest 5 events  -->
    <?php 
      $query = "SELECT eventid, eventTitle, startTime, endTime, imagepath FROM event ORDER BY eventid DESC LIMIT 5 ";
      $result = @mysqli_query($db_connection, $query);

      $events = array();

      while ($row = mysqli_fetch_array($result)) {
        $events[] = array(  
          'eventid' => $row['eventid'], 
          'eventTitle' => $row['eventTitle'],  
          'startTime' => $row['startTime'], 
          'endTime' => $row['endTime'],  
          'imagepath' => $row['imagepath']
        ); 
      }
    ?>

    <section class="updates p-top" id="updates">
      <div class="container grid">
        <!-- use latest event as image -->
        <div><figure><img class="update-img" src="<?php if(isset($events[0]['imagepath'])) { echo $events[0]['imagepath']; } ?>" alt=""></figure></div>

        <div class="update-info" data-aos="slide-left">
          <h3 class="heading-3">Events</h3>
          <ul>
          <?php for ($row = 0; $row < sizeof($events); $row++) { 
                      ?>
            <a href="<?php echo "events.php#event" . $events[$row]['eventid']; ?>">
              <li class="events-link"><?php $start_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[$row]['startTime'] ); $end_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[$row]['endTime'] ); echo $events[$row]['eventTitle'] . ' - ' . $start_time->format('F j, Y, g:i a') . ' to ' . $end_time->format('g:i a');?></li>
            </a>
            <?php
                }
            ?>
          </ul>
          <div class="flex">
               <a class="btn btn-primary" href="events.php">More Information</a>
          </div> 
        </div>
        <!-- End Update Info -->
      </div>
    </section>

    <!-- get offers from database -->
    <?php 
      $query = "SELECT offerid, offerTitle, imagepath FROM special_offer ORDER BY offerid DESC limit 5";
      $result = @mysqli_query($db_connection, $query);

      $offers = array();

      while ($row = mysqli_fetch_array($result)) {
        $offers[] = array( 
          'offerid' => $row['offerid'],   
          'offerTitle' => $row['offerTitle'],  
          'imagepath' => $row['imagepath']
        ); 
      }
    ?>

    <section class="offers p-top" id="offers">
      <div class="container grid ">
        <div class="offer-info" data-aos="slide-right">
          <h3 class="heading-3">Latest Offers</h3>
          <ul>
          <?php for ($row = 0; $row < sizeof($offers); $row++) { 
                      ?>
            <a href="<?php echo "offers.php#offer" . $offers[$row]['offerid']; ?>">
              <li class="offers-link"><?php echo $offers[$row]['offerTitle'];?></li>
            </a>
            <?php
            }
            ?>
          </ul>
          <div class="flex">
               <a class="btn btn-primary" href="offers.php">More Information</a>
          </div> 
        </div>
         <!-- use latest offer as image -->
         <div><figure><img class="offer-img" src="<?php if(isset($offers[0]['imagepath'])) { echo $offers[0]['imagepath']; } ?>" alt=""></figure></div>

      </div>
    </section>

    <?php include 'footer.html' ?>

    <script src="js/app.js"></script>
  </body>

  </html>