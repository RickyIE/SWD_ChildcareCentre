<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/alex_temp.css">
    <title>Testimonial Manager</title>
    <script type="text/javascript" src="lib/jquery-3.6.0.min.js"></script>
    <?php include 'header.php' ?>
    <?php require('scripts/connect.php'); ?>
</head>

<body>


<?php

$query = "SELECT t2.testimonialId, t1.firstName, t1.lastName, t2.comment, t2.serviceName, t2.created, t3.county, t3.country
FROM user AS t1
INNER JOIN testimonial AS t2 ON t1.username = t2.parentEmail
INNER JOIN address AS t3 ON t1.username = t3.username;";

$retrieveFirstName = mysqli_query($db_connection, $query);

$dataArray = array();


if (mysqli_num_rows($retrieveFirstName) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($retrieveFirstName)) {
        $dataArray[] = $row;

    }

} else {
    echo "0 results";
}


$searchForm = $_POST['search-form'];

$query2 = "SELECT * FROM testimonial_panels;";

$result2 = mysqli_query($db_connection, $query2);

$dataArray2 = array();

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result2)) {
        $dataArray2[] = $row;

    }

} else {
    echo "0 results";
}


$string = "";
$rowsCounter = count($dataArray);


?>

<section class="day-details-info p-top">
    <div class="container grid">
        <!-- Search filter -->
        <form method='post' id="testimonials-search-form">
            <label for="search-form-id">Search for Keyword</label>
            <input type='search' class='dateFilter' name='search-form' id="search-form-id"
                   placeholder="Enter search criteria and click sort ...">
            <input type='button' class="btn btn-primary" name='btn_search' value='sort' id="testimonials-search">
            <input type='submit' class="btn btn-primary" name='btn_clear_panels' value='clear all panels' id="testimonials-clear-all-panels" onclick="deletePanels()" >
        </form>

    </div>
</section>

<section class="testimonial-top-text">
    <div class="container grid">
        <div class="feedback-text">
            <div id="testimonials-wrapper">
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
<script src="js/testimonial_manager.js"></script>
</body>

<script type="text/javascript">

    const allDataArray = <?php echo json_encode($dataArray); ?>; // parse the PHP array in to a JavaScript array
    const buttonPopulate = document.querySelector('#testimonials-button-populate');
    const buttonClear = document.querySelector('#testimonials-button-clear').addEventListener('click', removeTable);
    const tableContainer = document.querySelector('#testimonials-table-container'); // create the table inside teh container
    const searchButton = document.querySelector('#testimonials-search').addEventListener('click', populateEntriesRegex);
    var sortedArray = [];
    document.querySelector('body').addEventListener("load", loadEntries);
    window.onload = loadEntries(allDataArray);


    buttonPopulate.onclick = function populateEntries() {
        loadEntries(allDataArray);
    }



    function loadEntries(myArray) {


        if (!!document.getElementById('testimonials-table') === true) {
            removeTable();
        }

        var dataArray = myArray // parse the PHP array in to a JavaScript array

        let headers = ['ID', 'First Name', 'Last Name', 'Testimonial', 'Activity', 'Date', 'County', 'Country', 'Update'];

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

            let cellId = document.createElement('td');
            cellId.innerHTML = (dataArray[i]['testimonialId']);
            cellId.id = 'testimonials-body-id-' + id_count;

            row.appendChild(cellId);

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

            let cellButton = document.createElement('button');
            cellButton.classList.add('btn-del');
            cellButton.innerHTML = ('Update');
            cellButton.id = 'testimonials-body-update-' + id_count;
            cellButton.type = "submit";


            cellButton.onclick = function () {

                sortedArray[0] = cellId.innerHTML;
                sortedArray[1] = cellFirstName.innerHTML;
                sortedArray[2] = cellLastName.innerHTML;
                sortedArray[3] = cellComment.innerHTML;
                sortedArray[4] = cellServiceName.innerHTML;
                sortedArray[5] = cellCreated.innerHTML;
                sortedArray[6] = cellCounty.innerHTML;
                sortedArray[7] = cellCountry.innerHTML;


                switch (cellPanelChoice.value) {

                    case"1":

                        let header = document.getElementById('testimonials-panel-1-heading').innerHTML = (sortedArray[3]);
                        let name = document.getElementById('testimonials-panel-1-name').innerHTML = (sortedArray[1] + "," + sortedArray[2]);
                        let date = document.getElementById('testimonials-panel-1-location').innerHTML = (sortedArray[6] + ",\u00A0" + sortedArray[7] + ",\u00A0" + sortedArray[5]);

                        updatePanels("1" , sortedArray);

                        break;

                    case"2":

                        let header2 = document.getElementById('testimonials-panel-2-heading').innerHTML = (sortedArray[3]);
                        let name2 = document.getElementById('testimonials-panel-2-name').innerHTML = (sortedArray[1] + " " + sortedArray[2]);
                        let date2 = document.getElementById('testimonials-panel-2-location').innerHTML = (sortedArray[6] + ", " + sortedArray[7] + " - " + sortedArray[5]);

                        updatePanels("2" , sortedArray);

                        break;

                    case"3":

                        let header3 = document.getElementById('testimonials-panel-3-heading').innerHTML = (sortedArray[3]);
                        let name3 = document.getElementById('testimonials-panel-3-name').innerHTML = (sortedArray[1] + " " + sortedArray[2]);
                        let date3 = document.getElementById('testimonials-panel-3-location').innerHTML = (sortedArray[6] + ", " + sortedArray[7] + " - " + sortedArray[5])

                        updatePanels("3" , sortedArray);

                        break;

                    case"4":

                        let header4 = document.getElementById('testimonials-panel-4-heading').innerHTML = (sortedArray[3]);
                        let name4 = document.getElementById('testimonials-panel-4-name').innerHTML = (sortedArray[1] + " " + sortedArray[2]);
                        let date4 = document.getElementById('testimonials-panel-4-location').innerHTML = (sortedArray[6] + ", " + sortedArray[7] + " - " + sortedArray[5]);

                        updatePanels("4" , sortedArray);

                        break;
                }


            }
            row.appendChild(cellButton);


            let cellPanelChoice = document.createElement('select');
            cellPanelChoice.name = 'testimonials-select-panel';
            cellPanelChoice.id = 'testimonials-body-select-' + id_count;

            let testimonialPanels = document.querySelector('.slider').childElementCount;

            for (let i = 0; i < testimonialPanels; i++) { // give options for panels

                let id_counter = i + 1;

                let option = document.createElement("option");
                option.text = "Panel " + id_counter;
                option.value = id_counter.toString();
                cellPanelChoice.add(option, cellPanelChoice[i]);

            }

            row.appendChild(cellPanelChoice);

            table.appendChild(row);
        }


        tableContainer.appendChild(table); // append everything to the table Div


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

    function removeTable() {
        const removeElement = document.querySelector('#testimonials-table');
        removeElement.parentElement.removeChild(removeElement);
    }

    function updatePanels(stringPanel, sortedArray) // ajax call
    {

        var data = new FormData();
        data.append('panel', stringPanel);
        data.append('firstName', sortedArray[1].toString());
        data.append('lastName', sortedArray[2].toString());
        data.append('comment', sortedArray[3].toString());
        data.append('activity', sortedArray[4].toString());
        data.append('county', sortedArray[6].toString());
        data.append('country', sortedArray[7].toString());
        data.append('date', sortedArray[5].toString());
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "scripts/updateTestimonials.php");
        xhr.send(data);

    }

    function deletePanels() // ajax call
    {

        if (confirm("Delete all panel data ? ")) {

            var data = new FormData();
            data.append('panel', 'delete');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', "scripts/deleteTestimonials.php");
            xhr.send(data);
            window.parent.location = window.parent.location.href;
        }


    }

</script>
;

</html>