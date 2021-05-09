<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'header.php'; ?>
      <title>Index Edit</title>
   </head>
   <body>
      <?php 
         // select data
         $query1 = "SELECT serviceid, servicetitle, servicedetail, imagepath, link FROM service";
         
         // add results to array for later    
         $result1 = @mysqli_query($db_connection, $query1);
         $services = array();
         while ($row = mysqli_fetch_array($result1)) {
           $services[] = array(  
             'serviceid' => $row['serviceid'],  
             'servicetitle' => $row['servicetitle'], 
             'servicedetail' => $row['servicedetail'],  
             'imagepath' => $row['imagepath'],  
             'link' => $row['link']
           ); 
         }
         
         // select data
         $query2 = "SELECT eventid, eventtitle, eventdetail, starttime, endtime, imagepath, link FROM event";
         
         // add results to array for later    
         $result2 = @mysqli_query($db_connection, $query2);
         $events = array();
         while ($row = mysqli_fetch_array($result2)) {
           $events[] = array(  
             'eventid' => $row['eventid'],  
             'eventtitle' => $row['eventtitle'], 
             'eventdetail' => $row['eventdetail'],  
             'starttime' => $row['starttime'],  
             'endtime' => $row['endtime'],  
             'imagepath' => $row['imagepath'],  
             'link' => $row['link']
           ); 
         }

          // select data
          $query3 = "SELECT offerid, offertitle, offerdetail, imagepath, link FROM special_offer";
         
          // add results to array for later    
          $result3 = @mysqli_query($db_connection, $query3);
          $offers = array();
          while ($row = mysqli_fetch_array($result3)) {
            $offers[] = array(  
              'offerid' => $row['offerid'],  
              'offertitle' => $row['offertitle'], 
              'offerdetail' => $row['offerdetail'],
              'imagepath' => $row['imagepath'],  
              'link' => $row['link']
            ); 
          }
         ?>
      <section class="day-details">
         <div class="container">
            <h2 class="heading-2">Services</h2>
            <table class="day-details-table">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>IMAGE</th>
                     <th>TITLE</th>
                     <th>DETAIL</th>
                     <th>LINK</th>
                     <th>UPDATE</th>
                     <th>DELETE</th>
                  </tr>
               </thead>
               <tbody>
                  <?php             
                     for ($row = 0; $row < sizeof($services); $row++) { 
                     ?>              
                  <tr>
                     <form method='get' action='service-update-form.php'>
                        <td><input type='number' name='serviceid' value='<?php  echo $services[$row]['serviceid']; ?>' readonly></td>
                        <td> <img src="<?php echo $services[$row]['imagepath']; ?>" alt="" class="service-image"></td>
                        <td> <?php echo $services[$row]['servicetitle']; ?> </td>
                        <td> <?php echo $services[$row]['servicedetail']; ?> </td>
                        <td> <?php echo $services[$row]['link']; ?> </td>
                        <td><button type='submit' name='' class="btn-up">Update</button></td>
                        <td><button type="submit" formaction="scripts/delete_service.php" class="btn-del">Delete</button></td>
                     </form>
                  </tr>
                  <?php  
                     }      
                     ?>        
               </tbody>
            </table>
         </div>
      </section>
      <section class="day-details">
         <div class="container">
            <h2 class="heading-2">Events</h2>
            <table class="day-details-table">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>IMAGE</th>
                     <th>TITLE</th>
                     <th>DETAIL</th>
                     <th>START</th>
                     <th>END</th>
                     <th>LINK</th>
                     <th>UPDATE</th>
                     <th>DELETE</th>
                  </tr>
               </thead>
               <tbody>
                  <?php             
                     for ($row = 0; $row < sizeof($events); $row++) { 
                     ?>              
                  <tr>
                     <form method='get' action='event-update-form.php'>
                        <td><input type='number' name='eventid' value='<?php  echo $events[$row]['eventid']; ?>' readonly></td>
                        <td> <img src="<?php echo $events[$row]['imagepath']; ?>" alt="" class="event-image"></td>
                        <td> <?php echo $events[$row]['eventtitle']; ?> </td>
                        <td> <?php echo $events[$row]['eventdetail']; ?> </td>
                        <td> <?php echo $events[$row]['starttime']; ?> </td>
                        <td> <?php echo $events[$row]['endtime']; ?> </td>
                        <td> <?php echo $events[$row]['link']; ?> </td>
                        <td><button type='submit' name='' class="btn-up">Update</button></td>
                        <td><button type="submit" formaction="scripts/delete_event.php" class="btn-del">Delete</button></td>
                     </form>
                  </tr>
                  <?php  
                     }      
                     ?>        
               </tbody>
            </table>
         </div>
      </section>
      <section class="day-details">
         <div class="container">
            <h2 class="heading-2">Special Offers</h2>
            <table class="day-details-table">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>IMAGE</th>
                     <th>TITLE</th>
                     <th>DETAIL</th>
                     <th>LINK</th>
                     <th>UPDATE</th>
                     <th>DELETE</th>
                  </tr>
               </thead>
               <tbody>
                  <?php             
                     for ($row = 0; $row < sizeof($offers); $row++) { 
                     ?>              
                  <tr>
                     <form method='get' action='offer-update-form.php'>
                        <td><input type='number' name='offerid' value='<?php  echo $offers[$row]['offerid']; ?>' readonly></td>
                        <td> <img src="<?php echo $offers[$row]['imagepath']; ?>" alt="" class="offer-image"></td>
                        <td> <?php echo $offers[$row]['offertitle']; ?> </td>
                        <td> <?php echo $offers[$row]['offerdetail']; ?> </td>
                        <td> <?php echo $offers[$row]['link']; ?> </td>
                        <td><button type='submit' name='' class="btn-up">Update</button></td>
                        <td><button type="submit" formaction="scripts/delete_offer.php" class="btn-del">Delete</button></td>
                     </form>
                  </tr>
                  <?php  
                     }      
                     ?>        
               </tbody>
            </table>
         </div>
      </section>
   </body>
   <?php include 'footer.html' ?>
   <div class="overlay hidden"></div>
   <script src="js/app.js"></script>
   </body>
</html>