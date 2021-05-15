<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php' ?>
  <title>Day Details Edit</title>
</head>

<body>



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

  <section class="day-details">
    <div class="containerD">
      <table class="day-details-table day-details-table-edit">
        <thead>
          <tr>
            <th style="width: 20px;">ID</th>
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
                <form method='get' action='update-day-details-form.php' class="day-details-edit-form">
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
      <div class="flex">
        <a class="btn btn-primary" href="new-day-details-form.php">+ Add Record</a>
      </div> 
    </div>
  </section>  

  <?php include 'footer.html' ?>

  <div class="overlay hidden"></div>
  <script src="js/app.js"></script>
</body>

</html>