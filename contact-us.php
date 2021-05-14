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

        <div class="form-card">
          <form action="#" class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name">

            <label for="email">Email:</label>
            <input type="email" id="email">

            <label for="message">Message</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>

            <button class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </section>
    <?php include 'footer.html' ?>
    <div class="overlay hidden"></div>
    <script src="js/app.js"></script>
  </body>

  </html>