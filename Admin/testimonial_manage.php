
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
          integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
          crossorigin="anonymous" />
    <link rel="stylesheet" href="../CSS/admin_style.css">
    <title>Admin : testimonial_manager </title>
</head>
<body>
<div class="container" id="testimonial-manager-Container">
<div class="side-menu">
    <ul>
        <li>
            <a href="">
                <span class="icon"><img src="https://img.icons8.com/bubbles/50/000000/system-administrator-male.png"/></span>
                <span class="icon">index_edit</span>
            </a>
        </li>
        <li>
            <a href="">
                <span class="icon"><img src="https://img.icons8.com/bubbles/50/000000/system-administrator-male.png"/></span>
                <span class="icon">registration_edit</span>
            </a>
        </li>
        <li>
            <a href="">
                <span class="icon"><img src="https://img.icons8.com/bubbles/50/000000/system-administrator-male.png"/></span>
                <span class="icon">day_details_edit</span>
            </a>
        </li>
        <li>
            <a href="">
                <span class="icon"><img src="https://img.icons8.com/bubbles/50/000000/system-administrator-male.png"/></span>
                <span class="icon">testimonial_manage</span>
            </a>
        </li>
        <li>
            <a href="">
                <span class="icon"><img src="https://img.icons8.com/bubbles/50/000000/system-administrator-male.png"/></span>
                <span class="icon">contact_us_manage</span>
            </a>
        </li>
        <li>
            <a href="">
                <span class="icon"><img src="https://img.icons8.com/bubbles/50/000000/system-administrator-male.png"/></span>
                <span class="icon">sign_out</span>
            </a>
        </li>
    </ul>
</div>

    <div id="area-1" class="adminPanel">
        <div id="area-1-data">
            <div class="testimonial-entry-wrapper">
                <div class="testimonial-entry-testimonialId" id="testimonial-id-1"><p>testimonialId</p></div>
                <div class="testimonial-entry-first-name" id="testimonial-first-name-1">first name</div>
                <div class="testimonial-entry-last-name" id="testimonial-last-name-1">last name</div>
                <div class="testimonial-entry-comment" id="testimonial-comment-1">comment</div>
                <div class="testimonial-entry-service-name" id="testimonial-service-name-1">service name</div>
                <div class="testimonial-entry-created" id="testimonial-created-1">create</div>
            </div>
        </div>
        <div id="area-1-buttons">
            <div class="admin-button" align="center">Add Call to Action</div>
            <div class="admin-button" align="center">Add Call to Action</div>
        </div>

    </div>
    <div id="area-2" class="adminPanel">area_2</div>
    <div id="area-3" class="adminPanel">area_3</div>
    <div id="area-4" class="adminPanel">area_4</div>
    <div id="area-5" class="adminPanel">area_5</div>
    <footer class="adminPanel">Footer</footer>
</div>
</body>

<!--<script src="../js/testimonial_manager.js"></script>-->

<script>
    function helloWord(){
        alert("Hello World");
    }
</script>
</html>




<?php
//    require ('../scripts/connect.php');

        /* ----------------------- Remove Later -----------------------*/

        DEFINE('DB_USER', 'meetalex_websiteRoot');
        DEFINE('DB_PASSWORD', 'pXZOkNzt}hsIT2WAH+1X*(HGo');
        DEFINE('DB_HOST', '50.87.177.72');
        DEFINE('DB_NAME', 'meetalex_ChildcareDatabse');
        $db_connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR
        die("Could not connect to MySQL! ". mysqli_connect_error());
        mysqli_set_charset($db_connection, 'utf8');

        /* ----------------------- Remove Later -----------------------*/


//        echo "<script>document.getElementById('area-1-data').innerHTML = ('Hello') ;</script>";
//        echo "<script>console.log(\"hello world\");</script>";

        $query = "

                select t2.testimonialId, t1.firstName, t1.lastName, t2.comment, t2.serviceName, t2.created
                from user as t1
                inner join testimonial as t2 on t1.username = t2.parentEmail;

                ";

        $result = mysqli_query($db_connection ,$query);


        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $result = $row["testimonialId"];
                echo "<script>document.getElementById('testimonial-id-1').innerHTML = ('$result') ;</script>";
                $result = $row["firstName"];
                echo "<script>document.getElementById('testimonial-first-name-1').innerHTML = ('$result') ;</script>";
                $result = $row["lastName"];
                echo "<script>document.getElementById('testimonial-last-name-1').innerHTML = ('$result') ;</script>";
                $result = $row["comment"];
                echo "<script>document.getElementById('testimonial-comment-1').innerHTML = ('$result') ;</script>";
                $result = $row["serviceName"];
                echo "<script>document.getElementById('testimonial-service-name-1').innerHTML = ('$result') ;</script>";
                $result = $row["created"];
                echo "<script>document.getElementById('testimonial-created-1').innerHTML = ('$result') ;</script>";
            }

        } else {
            echo "0 results";
        }
        $db_connection->close();



?>
