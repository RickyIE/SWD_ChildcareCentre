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
  <title>Day Details Page</title>
</head>

<body>

<?php require ('scripts/connect.php'); ?>

  <!-- Navbar -->
  <div class="navbar" id="home">
    <div class="container flex">
      <figure><img class="logo" src="img/logo-01.svg" alt=""></figure>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#updates">Updates</a></li>
          <li><a href="#offers">Offers</a></li>
        </ul>
      </nav>

      <div class="nav-buttons">
        <button class="btn btn-primary btn-primary show-sign-up-modal">Sign Up</button>
        <button class="btn btn-primary btn-secondary show-log-in-modal">Log In</button>
      </div>

    </div>
  </div>
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

  <!-- get children from database -->
  <?php       
    $query = "SELECT childid, firstname, lastname FROM children";
    $result = @mysqli_query($db_connection, $query);
    $children = array();
    while ($row = mysqli_fetch_array($result)) {
      $children[] = array(  
        'childid' => $row['childid'],  
        'firstname' => $row['firstname'], 
        'lastname' => $row['lastname']
      ); 
    }
  ?>

  <!-- get activities from database -->
  <?php       
    $query = "SELECT activityid, activitytitle FROM activity";
    $result = @mysqli_query($db_connection, $query);
    $activity = array();
    while ($row = mysqli_fetch_array($result)) {
      $activity[] = array(  
        'activityid' => $row['activityid'],  
        'activitytitle' => $row['activitytitle']
      ); 
    }
  ?>


  <div class="add-details-modal">
    <button class="close-add-modal">&times;</button>
    <h1>Add Details</h1>
    <div class="form-card">
      <form class="add-details-form" action='scripts\add_daily_details.php' method='POST'>
      <label for="">Child</label>

      <div class="custom-select">
        <select name="childname">
      <option class="custom-option" value="">-----------------</option>
      <?php
        for ($row = 0; $row < sizeof($children); $row++) { 
        ?>   
        <option class="custom-option" value="<?php echo $children[$row]['childid']; ?>"><?php echo $children[$row]['firstname'] . ' ' . $children[$row]['lastname']; ?></option>; 
        <?php  
      }      
      ?>   
      </select>
      </div>

        <label for="">Temperature</label>
        <input type="text" id="temperature" name="temperature" placeholder="">

        <label for="breakfast">Breakfast</label>
        <textarea name="breakfast" id="breakfast" cols="30" rows="10"></textarea>

        <label for="lunch">Lunch</label>
        <textarea name="lunch" id="lunch" cols="30" rows="10"></textarea>

        <label for="">Activities</label>
        <div class="custom-select">
          <select name="activities">
        <option class="custom-option" value="">-----------------</option>
          <?php
            for ($row = 0; $row < sizeof($activity); $row++) { 
            ?>   
            <option class="custom-option" value="<?php echo $activity[$row]['activityid']; ?>"><?php echo $activity[$row]['activitytitle']; ?></option>; 
            <?php  
          }      
        ?>   
      </select>
        </div>
        <button class="btn btn-primary">Add Details</button>
      </form>
    </div>
    <!-- End form Card -->
  </div>
  

  <!-- Script -->
    <script src='jquery-3.3.1.js' type='text/javascript'></script>
    <script src='jquery-ui.min.js' type='text/javascript'></script>
    <script type='text/javascript'>
      $(document).ready(function(){
        $('.dateFilter').datepicker({
            dateFormat: "yyyy-mm-dd"
        });
      });
    </script>

  <section class="day-details-info p-top">
    <div class="container grid">
        <!-- Search filter -->
        <form method='post' action=''>
          <label for="id">Date</label>
          <input type='date' class='dateFilter' name='date' value='<?php if(isset($_POST['dateFilter'])) { echo $_POST['dateFilter']; } ?>'>
          <input type='submit' class="btn btn-primary" name='btn_search' value='Search'>
        </form>        
        <button class="btn btn-primary btn-add" ><a href="new-day-details-form.php">Add</a></button> 
      </div>        
    </section>    

     <!-- get records from database -->
     <?php 

      $query = "SELECT dr.recordid, c.firstname, c.lastname, dr.temperature, dr.breakfast, dr.lunch, a.activitytitle, dr.created FROM daily_record dr inner join children c on dr.childid = c.childid inner join activity a on dr.activityid = a.activityid";

      // Date filter
       if(isset($_POST['btn_search'])){
        $date = $_POST['date'];        

        if(!empty($date)) {
           $query .= " WHERE dr.created = '$date'";
        }
      } 

      $result = @mysqli_query($db_connection, $query);
      $records = array();
      while ($row = mysqli_fetch_array($result)) {
        $records[] = array(  
          'recordid' => $row['recordid'],  
          'firstname' => $row['firstname'], 
          'lastname' => $row['lastname'],  
          'breakfast' => $row['breakfast'],  
          'temperature' => $row['temperature'],  
          'lunch' => $row['lunch'],  
          'activitytitle' => $row['activitytitle'],
          'created' => $row['created']
        ); 
      }
    ?>



   

  </section>
  <section class="day-details">
    <div class="container">
      <table class="day-details-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Temperature</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Activities</th>
            <th>Date</th>
            <th>Update</th>
            <th>Delete</th>            
          </tr>
        </thead>
        <tbody>
          <?php             
            for ($row = 0; $row < sizeof($records); $row++) { 
              ?>              
              <tr>
                <form method='get' action='update-day-details-form.php'>
                  <td><input type='number' name='recordid' value='<?php  echo $records[$row]['recordid']; ?>' readonly></td>
                  <td> <?php echo $records[$row]['firstname'] . ' ' . $records[$row]['lastname']; ?> </td>
                  <td> <?php echo $records[$row]['temperature']; ?> </td>
                  <td> <?php echo $records[$row]['breakfast']; ?> </td>
                  <td> <?php echo $records[$row]['lunch']; ?> </td>
                  <td> <?php echo $records[$row]['activitytitle']; ?> </td>
                  <td> <?php echo $records[$row]['created']; ?> </td>
                  <td><button type='submit' name='btn_update' class="btn-up">Update</button></td>
                  <td><button type="submit" formaction="scripts/delete_daily_details.php" class="btn-del">Delete</button></td>   
                </form>
              </tr>  
              <?php  
              }      
          ?>        
        </tbody>
      </table>
    </div>
  </section>  

  <footer class="footer">
    <div class="container flex">
      <div>
        <figure><img class="logo" src="img/logo-white-01.svg" alt=""></figure>
      </div>

      <nav>
        <ul>
          <li>Contact Us</li>
          <li>Find Us</li>
          <li>Private Policy</li>
        </ul>
      </nav>
      <a href="#home">Back To Top<i class="fas fa-long-arrow-alt-up"></i></a>
    </div>
  </footer>
  <div class="overlay hidden"></div>
  <script src="js/app.js"></script>
</body>

</html>