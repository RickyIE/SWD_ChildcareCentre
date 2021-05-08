<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'header.php'; ?>
      <title>Index Edit</title>
   </head>
   <body>
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
        <section class="day-details">
         <div class="container">
         <h2 class="heading-2">Services</h2>
         <table class="day-details-table">
         <?PHP
         // loop array and create table
         for ($row = 0; $row < sizeof($services); $row++) {
             ?>    
               <thead>
                  <tr>
                     <th>ID</th>                    
                     <th>IMAGE</th>
                     <th>TITLE</th>
                     <th>DETAIL</th>
                     <th>LINK</th>
                     <th>Update</th>
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
                        <td><button type="submit" formaction="" class="btn-del">Delete</button></td>   
                     </form>
                  </tr>
                  <?php  
                     }      
                     ?>        
               </tbody>
            </table>
         </div>
      </section>
      <?php
         }
         ?>  
   </body>
   <?php include 'footer.html' ?>
   <div class="overlay hidden"></div>
   <script src="js/app.js"></script>
   </body>
</html>