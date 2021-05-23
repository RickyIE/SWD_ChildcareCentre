

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Testimonial Add</title>
    <script type="text/javascript" src="lib/jquery-3.6.0.min.js"></script>
    <?php include 'header.php' ?>

    <?php

    // create user session profile session here



    if (isset($_SESSION['user_id'])){
        $userId = $_SESSION['user_id'];
    }else{
        $userId = 'abasek2q@samsung.com'; // default for testing
    }


    // create user session profile session here

    ?>
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
}

//$searchForm ="";
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
}


$string = "";
$rowsCounter = count($dataArray);

$query4 = "SELECT firstName FROM user WHERE username = '$userId';";


$retrieveFirstName = mysqli_query($db_connection, $query4);

$dataArray4 = array();


if (mysqli_num_rows($retrieveFirstName) > 0) {
    while ($row = mysqli_fetch_assoc($retrieveFirstName)) {
        $dataArray4[] = array('firstName' => $row ['firstName']);

    }

} else {
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $comment = $_POST['testimonial-add-comment'];
    $commentDate = date("Y-m-d");
    $userFirstName = $dataArray4 [0]['firstName'];
    $service =$_POST['testimonial-add-service'];
    $userEmail = $userId;

    if (empty($comment) === false) {

        $query5 = "INSERT INTO testimonial (comment, parentEmail, serviceName, created ,isDisplayed)
        VALUES ('$comment', '$userEmail' ,'$service', '$commentDate'  , 1);";

        $insertIntoTestimonial = mysqli_query($db_connection, $query5);

    }
}



?>

<section class="day-details-info p-top">
    <div class="container grid">
        <!-- Search filter -->
        <form method='post' id="testimonials-search-form">
            <label for="search-form-id">Search for Keyword</label>
            <input type='search' class='dateFilter' name='search-form' id="search-form-id"
                   placeholder="Enter search criteria and click sort ..." onkeydown="return event.key != 'Enter';">
            <input type='button' class="btn btn-primary" name='btn_search' value='sort' id="testimonials-search">
        </form>
    </div>
</section>

<section class="testimonial-top-text">
    <div class="container grid">
        <div class="feedback-text">
            <div id="testimonials-wrapper">
                <div id="testimonials-form-container">
                    <div class="form sign-up-form-card">
                        <form class="sign-up-form" action='' method='POST'>
                            <label for="testimonial-add-service">Service Name</label>
                            <select name="testimonial-add-service" id="testimonial-add-service-id" required>

                                <?php


                                $query3 = "SELECT activityTitle FROM activity;";

                                $retrieveActivities = mysqli_query($db_connection, $query3);

                                $dataArray3 = array();

                                if (mysqli_num_rows($retrieveActivities) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($retrieveActivities)) {
                                        $dataArray3[] = array('activityTitle' => $row ['activityTitle']);

                                    }

                                } else {
                                }

                                for ($i = 0; $i < sizeof($dataArray3); $i++){
                                    echo $row = $dataArray3 [$i]['activityTitle'];
                                    echo "<option value='$row' >$row</option>";
                                }
                                ?>

                            </select>

                            <input type="hidden" name="testimonial-add-date" id="testimonial-add-date-id" value="<?php echo $commentDate; ?>">

                            <input type="hidden" name="testimonial-add-first-name" id="testimonial-add-first-name-id" value="

                                <?php echo $userFirstName ?>">

                            <label for="testimonial-add-comment">Comment</label>
                            <textarea type="text" name="testimonial-add-comment" id="testimonial-add-comment-id" value="<?php if (isset($comment)) { echo $comment; } ?>" cols="30" rows="10" required></textarea>
                                <input class="btn btn-primary sign-up-btn"   type="submit" name="submit" value="Save" id="save-testimonial" >

                        </form>
                    </div>
                </div>

                <div class="container" id="testimonials-table-container">

                    <!-- JS elements -->

                </div>

            </div>

            <div class="container">
                <table class="day-details-table">
                    <tbody>
                    <tr>
                        <td>
                            <button class="btn-del show-del-modal" id="testimonials-button-populate">Reset Table</button>
                        </td>
                        <td>
                            <button class="btn-del show-del-modal" id="testimonials-button-clear">Clear Table</button>
                        </td>
                        <td>
                            <button class="btn-del show-del-modal" id="testimonials-button-add" onclick="toggleForm()">Add testimonial</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
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

<script type="text/javascript">

    const allDataArray = <?php echo json_encode($dataArray); ?>; // parse the PHP array in to a JavaScript array
    const buttonPopulate = document.querySelector('#testimonials-button-populate');
    const buttonClear = document.querySelector('#testimonials-button-clear').addEventListener('click', removeTable);
    const tableContainer = document.querySelector('#testimonials-table-container'); // create the table inside teh container
    const searchButton = document.querySelector('#testimonials-search').addEventListener('click', populateEntriesRegex);
    const userFirstName = <?php echo json_encode($dataArray4) ?>;
    var form = document.getElementById("testimonials-form-container");
    form.style.display = 'none';

    var sortedArray = [];
    document.querySelector('body').addEventListener("load", loadEntries);
    window.onload = loadEntries(allDataArray);


    buttonPopulate.onclick = function populateEntries() {
        loadEntries(allDataArray);
    }

    function populateEntriesRegex() {

        let formInput = document.getElementById('search-form-id');

        if (formInput.value.length > 0) {

            let arr = [];

            for (let i = 0; i < allDataArray.length; i++) {

                let input = formInput.value.toLowerCase();
                let regex = new RegExp(input);


                if (regex.test(allDataArray[i]['testimonialId'].toLowerCase()) === true ||
                    regex.test(allDataArray[i]['firstName'].toLowerCase()) === true ||
                    regex.test(allDataArray[i]['lastName'].toLowerCase()) === true ||
                    regex.test(allDataArray[i]['comment'].toLowerCase()) === true ||
                    regex.test(allDataArray[i]['serviceName'].toLowerCase()) === true ||
                    regex.test(allDataArray[i]['created'].toLowerCase()) === true ||
                    regex.test(allDataArray[i]['county'].toLowerCase()) === true ||
                    regex.test(allDataArray[i]['country'].toLowerCase()) === true) {

                    arr.push(allDataArray[i]);

                }


            }

            loadEntries(arr);


        } else {
            alert("Please input search criteria!")
        }

    }


    function loadEntries(myArray) {


        if (!!document.getElementById('testimonials-table') === true) {
            removeTable();
        }

        var dataArray = myArray // parse the PHP array in to a JavaScript array

        let headers = ['First Name', 'Last Name', 'Testimonial', 'Activity', 'Date', 'County', 'Country'];

        let table = document.createElement('table');
        table.id = 'testimonials-table';
        let headerRow = document.createElement('tr');


        for (let i = 0; i < headers.length; i++) { // fill the headers

            let arrayRowCounter = i - 1;

            let headerCell = document.createElement('th');
            headerCell.innerHTML = headers[i];
            headerRow.appendChild(headerCell);

        }
        ;

        table.appendChild(headerRow); // append the cells to the header

        for (let i = 0; i < dataArray.length; i++) {

            let id_count = i + 1;

            let row = document.createElement('tr');

            let cellFirstName = document.createElement('td');
            cellFirstName.innerHTML = (dataArray[i]['firstName']);
            cellFirstName.id = 'testimonials-body-first-name-' + id_count;

            row.appendChild(cellFirstName);

            let cellLastName = document.createElement('td');
            cellLastName.innerHTML = (dataArray[i]['lastName']);
            cellLastName.id = 'testimonials-body-last-name-' + id_count;

            row.appendChild(cellLastName);

            let cellComment = document.createElement('td');
            cellComment.innerHTML = (dataArray[i]['comment']);
            cellComment.id = 'testimonials-body-testimonial-' + id_count;

            row.appendChild(cellComment);

            let cellServiceName = document.createElement('td');
            cellServiceName.innerHTML = (dataArray[i]['serviceName']);
            cellServiceName.id = 'testimonials-body-activity-' + id_count;

            row.appendChild(cellServiceName);

            let cellCreated = document.createElement('td');
            cellCreated.innerHTML = (dataArray[i]['created']);
            cellCreated.id = 'testimonials-body-date-' + id_count;

            row.appendChild(cellCreated);

            let cellCounty = document.createElement('td');
            cellCounty.innerHTML = (dataArray[i]['county']);
            cellCounty.id = 'testimonials-body-county-' + id_count;

            row.appendChild(cellCounty);

            let cellCountry = document.createElement('td');
            cellCountry.innerHTML = (dataArray[i]['country']);
            cellCountry.id = 'testimonials-body-country-' + id_count;

            row.appendChild(cellCountry);

            table.appendChild(row);
        }


        tableContainer.appendChild(table); // append everything to the table Div


    }

    function removeTable() {
        const removeElement = document.querySelector('#testimonials-table');
        removeElement.parentElement.removeChild(removeElement);
    }

    function toggleForm(){

        var testimonialButton = document.getElementById('testimonials-button-add');

        if (form.style.display === "none") {
            testimonialButton.innerHTML = 'Cancel';
            removeTable();
            form.style.display = "block";
        } else {
            testimonialButton.innerHTML = 'Add Testimonial';
            loadEntries(allDataArray);
            form.style.display = "none";
        }
    }



</script>

</html>