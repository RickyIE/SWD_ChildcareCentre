  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
      integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
      crossorigin="anonymous" />
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
  </head>

  <body>

    <!-- Navbar -->
    <?php include 'header.php' ?>
    <!-- End Navigation -->

    <!-- Modals -->
    <div class="sign-up-modal">
      <button class="close-sign-up-modal">&times;</button>
      <h1>Sign Up</h1>
      <div class="form-card">
        <form class="sign-up-form" action='scripts\signup.php' method='POST'>
          <label for="first_name">First Name</label>
          <input type="text" name="first_name" id="first_name">

          <label for="last_name">Last Name</label>
          <input type="text" name="last_name" id="last_name">

          <label for="username">Username</label>
          <input type="text" name="username" id="username">

          <label for="password">Password</label>
          <input type="password" name="password" id="password">

          <label for="password_confirm">Confirm Password</label>
          <input type="password" name="password_confirm" id="password_confirm">

          <!-- might use these fields later, but commenting out for now.

          <label for="home-phone">Home Phone</label>
          <input type="tel" name="password" id="home-phone">

          <label for="address">Address</label>
          <textarea name="address" id="address" cols="30" rows="10"></textarea>

          -->

          <button class="btn btn-primary">Sign Up</button>
        </form>
      </div>
    </div>

    <div class="log-in-modal">
      <button class="close-log-in-modal">&times;</button>
      <h1>Log In</h1>
      <div class="form-card">
        <form class="log-in-form" action='scripts\login.php' method='POST'>
          <label for="username">Username</label>
          <input type="text" name="username" id="username">

          <label for="password">Password</label>
          <input type="password" name="password" id="password">

          <button class="btn btn-primary">Log In</button>
        </form>
      </div>
    </div>


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

    <!-- get services from database -->
    <?php 
      $query = "SELECT serviceTitle, serviceDetail, imagePath, link FROM service limit 3";
      $result = @mysqli_query($db_connection, $query);

      $services = array();

      while ($row = mysqli_fetch_array($result)) {
        $services[] = array(  
          'serviceTitle' => $row['serviceTitle'],  
          'serviceDetail' => $row['serviceDetail'], 
          'imagePath' => $row['imagePath'],  
          'link' => $row['link']
        ); 
      }
    ?>

    <section class="services p-top" id="services">
      <div class="container">
        <h2 class="heading-2 center">We strive to create a comforting
          learning experience where children will learn and interact in harmony. Here you can see some of the services
          we
          provide to make sure your child has a great stay with us.
        </h2>
        <div class="flex">
          <div>
            <figure><img src="<?php echo $services[0]['imagePath']; ?>" alt=""></figure>
            <h3 class="heading-3"><?php echo $services[0]['serviceTitle']?></h3>
            <p><?php echo $services[0]['serviceDetail']?></p>
          </div>

          <div>
            <figure><img src="<?php echo $services[1]['imagePath']; ?>" alt=""></figure>
            <h3 class="heading-3"><?php echo $services[1]['serviceTitle']?></h3>
            <p><?php echo $services[1]['serviceDetail']?></p>
          </div>

          <div>
            <figure><img src="<?php echo $services[2]['imagePath']; ?>" alt=""></figure>
            <h3 class="heading-3"><?php echo $services[2]['serviceTitle']?></h3>
            <p><?php echo $services[2]['serviceDetail']?></p>
          </div>
        </div>
      </div>
    </section>

    <!-- get events from database -->
    <?php 
      $query = "SELECT eventTitle, startTime, endTime, link FROM event limit 5";
      $result = @mysqli_query($db_connection, $query);

      $events = array();

      while ($row = mysqli_fetch_array($result)) {
        $events[] = array(  
          'eventTitle' => $row['eventTitle'],  
          'startTime' => $row['startTime'], 
          'endTime' => $row['endTime'],  
          'link' => $row['link']
        ); 
      }
    ?>

    <section class="updates p-top" id="updates">
      <div class="container grid">
        <!-- <figure><img src="img/updates-img.jpg" alt=""></figure> -->
        <div class="img"></div>

        <div class="update-info">
          <h3 class="heading-3">Events</h3>
          <ul>
            <li><?php $start_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[4]['startTime'] ); $end_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[4]['endTime'] ); echo $events[4]['eventTitle'] . ' - ' . $start_time->format('F j, Y, g:i a') . ' to ' . $end_time->format('g:i a');?></li>
            <li><?php $start_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[3]['startTime'] ); $end_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[3]['endTime'] ); echo $events[3]['eventTitle'] . ' - ' . $start_time->format('F j, Y, g:i a') . ' to ' . $end_time->format('g:i a');?></li>
            <li><?php $start_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[2]['startTime'] ); $end_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[2]['endTime'] ); echo $events[2]['eventTitle'] . ' - ' . $start_time->format('F j, Y, g:i a') . ' to ' . $end_time->format('g:i a');?></li>
            <li><?php $start_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[1]['startTime'] ); $end_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[1]['endTime'] ); echo $events[1]['eventTitle'] . ' - ' . $start_time->format('F j, Y, g:i a') . ' to ' . $end_time->format('g:i a');?></li>
            <li><?php $start_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[0]['startTime'] ); $end_time = DateTime::createFromFormat ( "Y-m-d H:i:s", $events[0]['endTime'] ); echo $events[0]['eventTitle'] . ' - ' . $start_time->format('F j, Y, g:i a') . ' to ' . $end_time->format('g:i a');?></li>
          </ul>

          <button class="btn btn-primary">More Update Information</button>
        </div>
        <!-- End Update Info -->
      </div>
    </section>

    <!-- get offers from database -->
    <?php 
      $query = "SELECT offerTitle, link FROM special_offer limit 5";
      $result = @mysqli_query($db_connection, $query);

      $offers = array();

      while ($row = mysqli_fetch_array($result)) {
        $offers[] = array(  
          'offerTitle' => $row['offerTitle'],  
          'link' => $row['link']
        ); 
      }
    ?>

    <section class="offers p-top" id="offers">
      <div class="container grid">
        <div class="offer-info">
          <h3 class="heading-3">Latest Offers</h3>
          <ul>
            <li><?php echo $offers[4]['offerTitle'];?></li>
            <li><?php echo $offers[3]['offerTitle'];?></li>
            <li><?php echo $offers[2]['offerTitle'];?></li>
            <li><?php echo $offers[1]['offerTitle'];?></li>
            <li><?php echo $offers[0]['offerTitle'];?></li>
          </ul>
          <button class="btn btn-secondary">More Offers Information</button>
        </div>
        <div class="img"></div>
      </div>
    </section>

    <?php include 'footer.html' ?>

    <div class="overlay hidden"></div>
    <script src="js/app.js"></script>
  </body>

  </html>