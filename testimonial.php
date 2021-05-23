<?php

// create user session profile session here

$userId = 'abasek2q@samsung.com';


// create user session profile session here

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Testimonial</title>
    <script type="text/javascript" src="lib/jquery-3.6.0.min.js"></script>
    <?php include 'header.php' ?>
</head>

<body>


<?php


$query = "SELECT t2.testimonialId, t1.firstName, t1.lastName, t2.comment, t2.serviceName, t2.created, t3.county, t3.country
FROM user AS t1
INNER JOIN testimonial AS t2 ON t1.username = t2.parentEmail
INNER JOIN address AS t3 ON t1.username = t3.username
WHERE t1.username = '$userId';";

$retrieveUserInfo = mysqli_query($db_connection, $query);

$dataArray = array();


if (mysqli_num_rows($retrieveUserInfo) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($retrieveUserInfo)) {
        $dataArray[] = $row;

    }

} else {
    echo "0 results";
}


//$searchForm = $_POST['search-form'];

$query2 = "SELECT * FROM testimonial_panels;";

$retrieveAllPanels = mysqli_query($db_connection, $query2);

$dataArray2 = array();

if (mysqli_num_rows($retrieveAllPanels) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($retrieveAllPanels)) {
        $dataArray2[] = $row;

    }

} else {
    echo "0 results";
}


$string = "";
$rowsCounter = count($dataArray);

$query4 = "SELECT firstName FROM user WHERE username = 'abasek2q@samsung.com';";


$retrieveFirstName = mysqli_query($db_connection, $query4);

$dataArray4 = array();


if (mysqli_num_rows($retrieveFirstName) > 0) {
    while ($row = mysqli_fetch_assoc($retrieveFirstName)) {
        $dataArray4[] = array('firstName' => $row ['firstName']);

    }

} else {
    echo "0 results";
}

?>

<section class="testimonial-top-text">
    <div class="container grid">
        <div class="feedback-text">
            <div class="feedback-text">
                <h2 class="heading-2">Not Sure Yet?</h2>
                <p>Parent feedback is so important to us at Kiddie Clubhouse and it’s always great for us to hear such
                    wonderful words of praise for our teams which celebrate and recognise the love, care and attention that
                    their
                    children receive in our crèches.</p>
                <br>
                <p>We understand that as parents, it can be difficult to leave your child with someone else, so it’s
                    reassuring to hear from other parents about the great experience that their children enjoy in Kiddie
                    Clubhouse every day.</p>
            </div>
        </div>
        <figure><img src="img/parent-feedback-01.svg" alt=""></figure>
    </div>
</section>

<section class="testimonials p-top">
    <div class="container">
        <div class="carousel">
            <div class="slider">
                <section>
                    <div class="slide-content flex" id="testimonials-panel-1">
                        <h3 class="heading-3 italic"
                            id="testimonials-panel-1-heading"><?php echo '"' . $dataArray2[0]['testimonial'] . '"' ?>
                        </h3>
                        <figure><img src="img/user-pic-2.jpg" alt=""></figure>
                        <h4 class="testimonial-name"
                            id="testimonials-panel-1-name"><?php echo $dataArray2[0]['first_name'] . " " . $dataArray2[0]['last_name'] ?></h4>
                        <h5 class="testimonial-location"
                            id="testimonials-panel-1-location"><?php echo $dataArray2[0]['county'] . ", " . $dataArray2[0]['country'] . ", " . $dataArray2[0]['date'] ?></h5>
                    </div>
                </section>

                <section>
                    <div class="slide-content flex" id="testimonials-panel-2">
                        <h3 class="heading-3 italic"
                            id="testimonials-panel-2-heading"><?php echo '"' . $dataArray2[1]['testimonial'] . '"' ?>
                        </h3>
                        <figure><img src="img/user-pic-1.jpg" alt=""></figure>
                        <h4 class="testimonial-name"
                            id="testimonials-panel-2-name"><?php echo $dataArray2[1]['first_name'] . " " . $dataArray2[1]['last_name'] ?></h4>
                        <h5 class="testimonial-location"
                            id="testimonials-panel-2-location"><?php echo $dataArray2[1]['county'] . ", " . $dataArray2[1]['country'] . ", " . $dataArray2[1]['date'] ?></h5>
                    </div>
                </section>

                <section>
                    <div class="slide-content flex" id="testimonials-panel-3">
                        <h3 class="heading-3 italic"
                            id="testimonials-panel-3-heading"><?php echo '"' . $dataArray2[2]['testimonial'] . '"' ?>
                        </h3>
                        <figure><img src="img/user-pic-4.jpg" alt=""></figure>
                        <h4 class="testimonial-name"
                            id="testimonials-panel-3-name"><?php echo $dataArray2[2]['first_name'] . " " . $dataArray2[2]['last_name'] ?></h4>
                        <h5 class="testimonial-location"
                            id="testimonials-panel-3-location"><?php echo $dataArray2[2]['county'] . ", " . $dataArray2[2]['country'] . ", " . $dataArray2[2]['date'] ?></h5>
                    </div>
                </section>

                <section>
                    <div class="slide-content flex" id="testimonials-panel-4">
                        <h3 class="heading-3 italic"
                            id="testimonials-panel-4-heading"><?php echo '"' . $dataArray2[3]['testimonial'] . '"' ?>
                        </h3>
                        <figure><img src="img/user-pic-3.jpg" alt=""></figure>
                        <h4 class="testimonial-name"
                            id="testimonials-panel-4-name"><?php echo $dataArray2[3]['first_name'] . " " . $dataArray2[3]['last_name'] ?></h4>
                        <h5 class="testimonial-location"
                            id="testimonials-panel-4-location"><?php echo $dataArray2[3]['county'] . ", " . $dataArray2[3]['country'] . ", " . $dataArray2[3]['date'] ?></h5>
                    </div>
                </section>


            </div>

            <div class="controls">
          <span class="arrow left">
            <i class="fas fa-chevron-left"></i>
          </span>
                <span class="arrow right">
            <i class="fas fa-chevron-right"></i>
          </span>
                <ul>
                    <li class="selected"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.html' ?>

<div class="overlay hidden"></div>
<script src="js/app.js"></script>
</body>
</html>