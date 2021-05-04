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
  <title>New Header</title>
</head>

<body>

  <!-- Navbar -->
  <div class="menu-area">
    <div class="container flex">

      <figure><img class="logo" src="img/logo-01.svg" alt=""></figure>

      <?php 
        // require connect file in header so it is required on all pages.
        require ('scripts/connect.php'); 

        $query = "SELECT id, parentid, title, link, accesslevel FROM menu ORDER BY parentid, id";
        $result = @mysqli_query($db_connection, $query);
        $menu = array();
        while ($row = mysqli_fetch_array($result)) {
          $menu[] = array(  
            'id' => $row['id'],  
            'parentid' => $row['parentid'], 
            'title' => $row['title'], 
            'link' => $row['link'], 
            'accesslevel' => $row['accesslevel']
          );         
        }

      

        ?>
        <ul>
          <?php    
            for ($row = 0; $row < sizeof($menu); $row++) {           
              if ($menu[$row]['parentid'] == 0) { // if top level, print item (but leave open ended)
              ?>         
              <li><a href="<?php echo $menu[$row]['link']; ?>"><?php echo $menu[$row]['title']; ?></a>
              <ul class="dropdown">
              <?php   
              for ($sub = 0; $sub < sizeof($menu); $sub++) { // loop again for sub items
                if ($menu[$sub]['parentid'] == $menu[$row]['id']) { // if match, print items
                  ?>         
                  <li><a href="<?php echo $menu[$sub]['link']; ?>"><?php echo $menu[$sub]['title']; ?></a></li>
                  <?php
                } else { // close original item
                  ?>
                  </li>
                  <?php
                }
              }
              ?>
              </ul>
              <?php
              }
            } 
          ?>
          </ul>
        <?php
        



      ?>

<!--   <ul>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Dropdown</a>
          <ul class="dropdown">
            <li><a href="#">Drop Link</a></li>
            <li><a href="#">Drop Link</a></li>
            <li><a href="#">Drop Link</a></li>
          </ul>
        </li>
      </ul>
-->
      <div class="nav-buttons">
        <button class="btn btn-primary btn-primary">Sign Up</button>
        <button class="btn btn-primary btn-secondary">Log In</button>
        <!-- <button class="btn btn-primary btn-secondary show-log-in-modal">Log Out</button> -->
      </div>

    </div>

  </div>
  <!-- End Navigation -->

</body>

</html>