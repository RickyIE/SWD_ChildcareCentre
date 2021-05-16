<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'header.php'; ?>
      <title>Registration Edit</title>
   </head>
   <body>
      <?php 
         // select data
         $query = "SELECT f.feeid, u.firstname, u.lastname , f.feeamount, f.ispaid, f.paiddate FROM fee f INNER JOIN registration r ON f.registrationid = r.registrationid INNER JOIN user u ON r.username = u.username";
         
         // add results to array for later    
         $result = @mysqli_query($db_connection, $query);
         $fees = array();
         while ($row = mysqli_fetch_array($result)) {
           $fees[] = array(  
             'feeid' => $row['feeid'],  
             'firstname' => $row['firstname'], 
             'lastname' => $row['lastname'],  
             'feeamount' => $row['feeamount'],  
             'ispaid' => $row['ispaid'],  
             'paiddate' => $row['paiddate']
           ); 
         }
         ?>
      <section class="day-details">
         <div class="container">
            <h2 class="heading-2">Fees</h2>
            <table class="day-details-table data-table">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>FIRST NAME</th>
                     <th>LAST NAME</th>
                     <th>FEE</th>
                     <th>PAID DATE</th>
                     <th>PAID</th>
                  </tr>
               </thead>
               <tbody>
                  <?php             
                     for ($row = 0; $row < sizeof($fees); $row++) { 
                     ?>              
                  <tr>
                     <form method='get' action='scripts/fee_paid.php'>
                        <td><input type='number' name='feeid' value='<?php  echo $fees[$row]['feeid']; ?>' readonly></td>
                        <td> <?php if(isset($fees[$row]['firstname'])) { echo $fees[$row]['firstname']; } ?></td>
                        <td> <?php if(isset($fees[$row]['lastname'])) { echo $fees[$row]['lastname']; } ?></td>
                        <td> <?php if(isset($fees[$row]['feeamount'])) { echo $fees[$row]['feeamount']; } ?></td>
                        <td> <?php if(isset($fees[$row]['paiddate'])) { echo $fees[$row]['paiddate']; } else { echo 'pending'; } ?></td>
                        <td><button type="submit" class="btn-del">Paid</button></td>
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
   <script src="js/app.js"></script>
   </body>
</html>