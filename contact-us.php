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
    <title>Contact Us</title>
    <?php include 'header.php' ?>
    <?php require('scripts/connect.php'); ?>
  </head>

  <body>

  <?php

  $name = "";
  $email = "";
  $phoneNumber = "";
  $message = "";
  $dateAndTime = date("Y/m/d - H:i:s");

  $nameError = "";
  $emailError = "";
  $messageError = "";


  if ($_SERVER["REQUEST_METHOD"] == "POST") { // post on submit



      if (empty($_POST["contact-us-name"])) {
          $nameError = "Name is a required field";
      }else if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["contact-us-name"])) { // performs regex on the selected pattern and checks if not correct error
              $nameError = "Please use only letters and whitespaces";
      }else{
          $name = trim($_POST["contact-us-name"]); // converts the selected input if it matches above requirements for pattern and assigns value
      }

      if (empty($_POST["contact-us-email"])) {
          $emailError = "Email is required";
      } else if (!filter_var($_POST["contact-us-email"], FILTER_VALIDATE_EMAIL)) {
              $emailError = "Invalid email format";
      }else{
              $email = trim($_POST["contact-us-email"]);
      }

      if (empty($_POST["contact-us-phone-number'"])) {
          $phoneNumber = "";
      } else {
          $phoneNumber = trim($_POST["contact-us-phone-number'"]);
      }

      if (empty($_POST["contact-us-message"])) {
          $messageError = "Message has to be between 50 and 500 characters";
      }
      else if (strlen($_POST["contact-us-message"]) < 50 || strlen($_POST["contact-us-message"]) > 500){
          $messageError = "Message has to be between 50 and 500 characters";
      }else{
          $message = trim($_POST["contact-us-message"]);
      }

      if (empty($message) === false ) {

          echo "<script> console.log('\"name\"+$name'); </script>";
          echo "<script> console.log('\"email\"+$email'); </script>";
          echo "<script> console.log('\"phone\"+$phoneNumber'); </script>";
          echo "<script> console.log('\"message\"+$message'); </script>";
          echo "<script> console.log('\"date and time\"+$dateAndTime'); </script>";

          $query = "
          INSERT INTO contact_us(name, email, phone, message, created)
            VALUES ('$name','$email','$phoneNumber','$message','$dateAndTime');
          ";

          $insertIntoContactUs = mysqli_query($db_connection, $query);
      }
  }


  ?>
  <section class="contact-us p-top">
      <div class="container grid">
        <div>
          <img class="contact-img" src="img/contact-img-01.svg" alt="">
          <p class="p-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat quidem quis quibusdam
            similique, nulla
            distinctio soluta et voluptatem quasi illum aspernatur amet! Nisi, fugit nam commodi eius magnam officia
            pariatur.</p>
          <br>
          <p class="p-text">(01) 254 1349</p>

          <div class="social-media-list">
            <ul>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-facebook"></i></a></li>
              <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
            </ul>
          </div>
        </div>

          <div class="form-card-container">
        <div class="form-card">
          <form action="" class="contact-form" method="post">
            <label for="contact-us-name" >Name:</label>
            <input type="text" name="contact-us-name" id="contact-us-name-id" placeholder="Hello my name is ..." value="<?php if (isset($name)) { echo $name; } ?>">
              <div class='red-text'><?php echo $nameError; ?></div>

            <label for="contact-us-email">Email:</label>
            <input type="email" name="contact-us-email" id="contact-us-email-id" placeholder="required" value="<?php if (isset($email)) { echo $email; } ?>">
              <div class='red-text'><?php echo $emailError; ?></div>

              <label for="contact-us-phone-number">phone number:</label>
              <input type="tel" name="contact-us-phone-number" id="contact-us-phone-number-id" placeholder="optional" value="<?php if (isset($phoneNumber)) { echo $phoneNumber; } ?>">

            <label for="contact-us-message">Message</label>
            <textarea name="contact-us-message" id="contact-us-message-id" cols="30" rows="10" placeholder="Anything we can help ?" value="<?php if (isset($message)) { echo $message; } ?>" ></textarea>
              <div class='red-text'><?php echo $messageError; ?></div>

            <input type="submit" class="btn btn-primary" name="submit" value="Send" id="submit-contact">
          </form>
        </div>
      </div>
    </section>
    <?php include 'footer.html' ?>
    <div class="overlay hidden"></div>
    <script src="js/app.js"></script>
  </body>

  </html>