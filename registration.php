<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'header.php'; ?>
      <title>Registration Form</title>
   </head>
   <body>
      <?php
         // get categories
         $query = "SELECT categoryid, category FROM category";
         $result = @mysqli_query($db_connection, $query);
         $category = array();
         while ($row = mysqli_fetch_array($result)) {
           $category[] = array(  
             'categoryid' => $row['categoryid'],  
             'category' => $row['category']
           ); 
         }
         ?>
      <?php 
         if ($_SERVER['REQUEST_METHOD'] == "POST") { 
         
          $errors = array('firstname' => '', 'lastname' => '', 'categoryid' => '', 'days' => '', 'failure' => '');  
         
          // validate username
          if (isset($_SESSION['user_id'])) { 
            $username = $_SESSION['user_id'];
          } else {
            $errors['failure'] = 'Please sign up / login beofre you register.'; // add error to array    
          }
         
          // validate first name
          if (empty($_POST['firstname']))
          { // check if value is empty
              $errors['firstname'] = 'Please provide a first name.'; // add error to array    
          }
          elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST['firstname']))
          {
              $errors['firstname'] = "Invalid first name! use only letters and white space.";
          } else {
              $firstname = trim($_POST['firstname']);
          }
         
          // validate last name
          if (empty($_POST['lastname']))
          { // check if value is empty
              $errors['lastname'] = 'Please provide a last name.'; // add error to array    
          }
          elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST['lastname']))
          {
              $errors['lastname'] = "Invalid first name! use only letters and white space.";
          } else {
              $lastname = trim($_POST['lastname']);
          }
         
          // validate categoryid
          if (empty($_POST['categoryid']))
          { // check if value is empty
              $errors['categoryid'] = 'Please select a category.'; // add error to array    
          } else {
          $categoryid = trim($_POST['categoryid']);
          }
         
          // validate days
          if (empty($_POST['days']))
          { // check if value is empty
              $errors['days'] = 'Please select a number of days.'; // add error to array    
          } else {
          $days = trim($_POST['days']);
          }
         
          // Evaluates array because it always has keyes, so never empty
          foreach($errors as $key => $value) {
            if ($value!=''){
                $emptycheck = 1; 
                break;
            }
            else {
                $emptycheck = 0;
            }
          }                
           
          // update record in database
          if (count(array_filter($errors)) == 0)
          { 
            $query1 = "INSERT INTO registration (categoryid, days, isactive, username) VALUES ('$categoryid', '$days', true, '$username')";
         
            $result1 = @mysqli_query($db_connection, $query1);    
         
              // if the query ran successfully
              if ($result1)
              { 
                // insert child details
                $query2 = "INSERT INTO children (username, firstname, lastname) VALUES ('$username', '$firstname', '$lastname')";        
                $result2 = @mysqli_query($db_connection, $query2);            
              // if the query ran successfully
              if ($result2)
              { 
               // send email (no email sever so commenting out code)
               // the body
               // $msg = "Thanks you! You regisrtaion has been recorded. We will be in contact with you soon. \nRegards,\nKIDDIE CHILDCARE ";

               // use wordwrap for longer than 70 characters
               // $msg = wordwrap($msg,70);

               // send email
               // mail($username, "KIDDIE CHILDCARE - New Registration", $msg);

                // go to all index edit page
                // header("Location: index.php");
                exit();            
              } else {
                $errors['failure'] = 'Error updating database! ' . mysqli_error($db_connection);
              } 
                // go to all index edit page
                header("Location: index.php");
                exit();            
              } else {
                $errors['failure'] = 'Error updating database! ' . mysqli_error($db_connection);
              }         
         
              
              mysqli_close($db_connection);  
            }
          }
         
           // check if user is logged in
           if (isset($_SESSION['user_id'])) {
             // show form
             ?>
      <section class="day-details">
         <div class="grid">
            <div class="left-content">
               <figure><img src="img/cog-01.svg" alt=""></figure>
            </div>
            <form enctype="multipart/form-data" method='post' action="" class="update-details-form">
               <label for="firstname">First Name</label>
               <input type="text" id="firstname" name="firstname" placeholder="" value="<?php if(isset($firstname)) { echo $firstname; } ?>">
               <div class='red-text'><?php if(isset($errors['firstname'])) { echo $errors['firstname']; } ?></div>
               <label for="lastname">Last Name</label>
               <input type="text" id="lastname" name="lastname" placeholder="" value="<?php if(isset($lastname)) { echo $lastname; } ?>">
               <div class='red-text'><?php if(isset($errors['lastname'])) { echo $errors['lastname']; } ?></div>
               <label for="category">Category</label>
               <div class="custom-select">
                  <select name="categoryid">
                     <?php
                        if (isset($categoryid)) {
                          for ($row = 0; $row < sizeof($category); $row++) { 
                            if ($category[$row]['categoryid'] == $categoryid) {
                          ?>   
                     <!-- add selected category first -->
                     <option class="custom-option" value="<?php echo $category[$row]['categoryid']; ?>"><?php echo $category[$row]['category']; ?></option>
                     ; 
                     <?php  
                        }
                        } 
                        for ($row = 0; $row < sizeof($category); $row++) { 
                          if ($category[$row]['categoryid'] != $childname) {
                        ?>   
                     <!-- add rest of categories -->
                     <option class="custom-option" value="<?php echo $category[$row]['categoryid']; ?>"><?php echo $category[$row]['category']; ?></option>
                     ; 
                     <?php  
                        }
                        }            
                        } else { // print them all
                        ?>
                     <option class="custom-option" value="">-----------------</option>
                     <?php
                        for ($row = 0; $row < sizeof($category); $row++) { 
                          ?>   
                     <option class="custom-option" value="<?php echo $category[$row]['categoryid']; ?>"><?php echo $category[$row]['category']; ?></option>
                     ; 
                     <?php  
                        } 
                        }    
                        ?>       
                  </select>
                  <div class='red-text'><?php if(isset($errors['categoryid'])) { echo $errors['categoryid']; } ?></div>
               </div>
               <label for="days">Days</label>
               <div class="custom-select">
                  <select name="days" id="days">
                    <option value="">-----------------</option>
                     <option value=".5">1/2 Day</option>
                     <option value="1">1 Day</option>
                     <option value="3">3 Days</option>
                     <option value="5">5 Days</option>
                  </select>
                  <div class='red-text'><?php if(isset($errors['days'])) { echo $errors['days']; } ?></div>
               </div>
               <div class="flex">
                  <button type="submit" class="btn btn-primary" >Register</button>
                  <div class='red-text'><?php if(isset($errors['failure'])) { echo $errors['failure']; } ?></div>
               </div>
            </form>
         </div>
      </section>
      <?php
         } else { 
           // promt user to login / sign up
           ?>
      <section class="day-details">
         <div class="grid">
            <div class="left-content">
               <figure><img src="img/cog-01.svg" alt=""></figure>
            </div>
            <p class="heading-2 center">Please <a href="sign-up-form.php">sign up</a> or <a href="login-form.php">login</a> to register a child!</p>
         </div>
      </section>
      <?php   
         } 
         ?>
      <?php include 'footer.html'; ?>
      <div class="overlay hidden"></div>
      <script src="js/app.js"></script>
   </body>
</html>