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
    <link rel="stylesheet" href="css/admin_style.css">
    <link rel="stylesheet" href="css/alex_temp.css">
  <title>Testimonial Manager




  </title>
</head>

<body>

  <!-- Navbar -->
  <div class="navbar" id="home">
    <div class="container flex">
      <figure><img class="logo" src="img/logo-01.svg" alt=""></figure>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#updates">Updates</a></li>
          <li><a href="#offers">Offers</a></li>
        </ul>
      </nav>

      <div class="nav-buttons">
        <button class="btn btn-primary btn-primary show-sign-up-modal">Sign Up</button>
        <button class="btn btn-primary btn-secondary show-log-in-modal">Log In</button>
      </div>

    </div>
  </div>
  <!-- End Navigation -->

  <section class="day-details-info p-top">
      <div class="container grid">
          <!-- Search filter -->
          <form method='post' action=''>
              <label for="id">Search for Keyword</label>
              <input type='text' class='dateFilter' name='date' value=''>
          </form>
          <input type='submit' class="btn btn-primary" name='btn_search' value='Search'>
      </div>
  </section>

  <section class="testimonial-top-text">
    <div class="container grid">
      <div class="feedback-text">
          <div id="testimonials-wrapper">
              <div class="container" id="testimonials-table-container">
<!--                  <table class="day-details-table" id="testimonials-table">-->
<!--                      <tr id="testimonials-head">-->
<!--                          <th id="testimonials-head-id-1">ID</th>-->
<!--                          <th id="testimonials-head-first-name-1">First Name</th>-->
<!--                          <th id="testimonials-head-last-name-1">Last Name</th>-->
<!--                          <th id="testimonials-head-testimonial-1">Testimonial</th>-->
<!--                          <th id="testimonials-head-activity-1">activity</th>-->
<!--                          <th id="testimonials-head-date-1">Date</th>-->
<!--                          <th id="testimonials-head-update-1">Update</th>-->
<!--                          <th id="testimonials-head-panel-1">Panel</th>-->
<!--                      </tr>-->
<!--                          <tr>-->
<!--                              <td id="testimonials-body-id-1" > 1 </td>-->
<!--                              <td id="testimonials-body-first-name-1" >First Name </td>-->
<!--                              <td id="testimonials-body-last-name-1" > Last Name </td>-->
<!--                              <td id="testimonials-body-testimonial-1" > Testimonial </td>-->
<!--                              <td id="testimonials-body-activity-1" > Activity </td>-->
<!--                              <td id="testimonials-body-date-1" > date </td>-->
<!--                              <td id="testimonials-body-update-1" ><button class="btn-del">Update</button></td>-->
<!--                              <td>-->
<!--                                  <div>-->
<!--                                      <select name="testimonials-select-panel" id="testimonials-body-select-1" required>-->
<!--                                          <option value="panel-1">Panel 1</option>-->
<!--                                          <option value="panel-2">Panel 2</option>-->
<!--                                          <option value="panel-3">Panel 3</option>-->
<!--                                          <option value="panel-4">Panel 4</option>-->
<!--                                      </select>-->
<!--                                  </div>-->
<!--                              </td>-->
<!--                          </tr>-->
<!--                      <tr>-->
<!--                          <td> 2 </td>-->
<!--                          <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ratione. </td>-->
<!--                          <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ratione. </td>-->
<!--                          <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ratione. </td>-->
<!--                          <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ratione. </td>-->
<!--                          <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ratione. </td>-->
<!--                          <td><button class="btn-del show-del-modal">Update</button></td>-->
<!--                          <td>-->
<!--                              <div>-->
<!--                                  <select name="testimonials-select-panel" id="testimonials-select-panel" required>-->
<!--                                      <option value="panel-1">Panel 1</option>-->
<!--                                      <option value="panel-2">Panel 2</option>-->
<!--                                      <option value="panel-3">Panel 3</option>-->
<!--                                      <option value="panel-4">Panel 4</option>-->
<!--                                  </select>-->
<!--                              </div>-->
<!--                          </td>-->
<!--                      </tr>-->
<!--                      </tr>-->
<!--                  </table>-->
          </div>
          </div>

          <div class="container">
              <table class="day-details-table">
                  <tbody>
                  <tr>
                      <td><button class="btn-del show-del-modal" id="testimonials-button-populate">Populate</button></td>
                      <td><button class="btn-del show-del-modal" id="testimonials-button-clear">Clear</button></td>
                  </tr>
                  </tbody>
              </table>
          </div>


          <!-- ************************** START ************************** -->


<!--          <div class="testimonial-entry-wrapper" id="testimonial-wrapper-1">-->
<!--              <div class="testimonial-entry-testimonialId" id="testimonial-id-1"><p>testimonialId</p></div>-->
<!--              <div class="testimonial-entry-first-name" id="testimonial-first-name-1">first name</div>-->
<!--              <div class="testimonial-entry-last-name" id="testimonial-last-name-1">last name</div>-->
<!--              <div class="testimonial-entry-comment" id="testimonial-comment-1">comment</div>-->
<!--              <div class="testimonial-entry-service-name" id="testimonial-service-name-1">service name</div>-->
<!--              <div class="testimonial-entry-created" id="testimonial-created-1">create</div>-->
<!--          </div>-->

          <!-- ************************** END ************************** -->

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
              <h3 class="heading-3 italic" id="testimonials-panel-1-heading">"Words cannot express the thanks that my family has for each and every
                Kiddie Clubhouse early childhood teacher and staff person that has been a part of our family for
                almost nine years."
              </h3>
              <figure><img src="img/user-pic-2.jpg" alt=""></figure>
              <h4 class="testimonial-name" id="testimonials-panel-1-name">Archie Andrews</h4>
              <h5 class="testimonial-location" id="testimonials-panel-1-location">Dublin, Ireland</h5>
            </div>
          </section>

          <section>
            <div class="slide-content flex">
              <h3 class="heading-3 italic">"We have been attending the creche for the 7 years with both of our boys
                and
                we have always appreciated the wonderful care provided to them."
              </h3>
              <figure><img src="img/user-pic-1.jpg" alt=""></figure>
              <h4 class="testimonial-name">Veronica Lodge</h4>
              <h5 class="testimonial-location">Cork, Ireland</h5>
            </div>
          </section>

          <section>
            <div class="slide-content flex">
              <h3 class="heading-3 italic">"My son Matteo has been going to Share and Care since he was 1 year old and
                now he is going to be 4 in March. He looks forward to it every day!! The atmosphere is amazing and the
                teachers, can’t ask for anything more. Thumbs up to them all!."
              </h3>
              <figure><img src="img/user-pic-4.jpg" alt=""></figure>
              <h4 class="testimonial-name">Kevin Keller</h4>
              <h5 class="testimonial-location">Dublin, Ireland</h5>
            </div>
          </section>

          <section>
            <div class="slide-content flex">
              <h3 class="heading-3 italic">"We’ve had a few daycare experiences before, I can absolutely say that
                Kiddie
                Clubhouse is a six-star experience for the kids. They’ve learnt to socialise, they’re writing their
                names,
                one of my kids is 4 and a half and the other is two."
              </h3>
              <figure><img src="img/user-pic-3.jpg" alt=""></figure>
              <h4> class="testimonial-name">Alice Cooper</h4>
                <h5 class="testimonial-location">Kerry, Ireland</h5>
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

  <footer class="footer">
    <div class="container flex">
      <div>
        <figure><img class="logo" src="img/logo-white-01.svg" alt=""></figure>
      </div>

      <nav>
        <ul>
          <li>Contact Us</li>
          <li>Find Us</li>
          <li>Private Policy</li>
        </ul>
      </nav>
      <a href="#home">Back To Top<i class="fas fa-long-arrow-alt-up"></i></a>
    </div>
  </footer>
  <div class="overlay hidden"></div>
  <script src="js/app.js"></script>
<script src="js/testimonial_manager.js"></script>
</body>

</html>


<?php require ('scripts/connect.php'); ?>

<?php

DEFINE('DB_USER', 'meetalex_websiteRoot');
DEFINE('DB_PASSWORD', 'pXZOkNzt}hsIT2WAH+1X*(HGo');
DEFINE('DB_HOST', '50.87.177.72');
DEFINE('DB_NAME', 'meetalex_ChildcareDatabse');
$db_connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR
die("Could not connect to MySQL! ". mysqli_connect_error());
mysqli_set_charset($db_connection, 'utf8');

$query = "
               
                                select t2.testimonialId, t1.firstName, t1.lastName, t2.comment, t2.serviceName, t2.created
                                from user as t1
                                inner join testimonial as t2 on t1.username = t2.parentEmail;
                
                                ";

$result = mysqli_query($db_connection, $query);
$dataArray = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $dataArray[] = $row;

    }

} else {
    echo "0 results";
}


$db_connection->close();

// ***************************** FOR TESTING *****************************

        $string = "";
        $rowsCounter = count($dataArray);

// ***************************** FOR TESTING *****************************

?>

<script>

    const buttonPopulate = document.querySelector('#testimonials-button-populate').addEventListener('click' , loadEntries);
    const buttonClear = document.querySelector('#testimonials-button-clear').addEventListener('click' , removeTable);

    const tableContainer = document.querySelector('#testimonials-table-container'); // create the table inside teh container






   function loadEntries(){

       if(!!document.getElementById('testimonials-table') === true){
           removeTable();
       }


            let variableCounter =  <?php echo $rowsCounter; ?>; // size of array


           var dataArray = <?php echo json_encode($dataArray); ?>; // parse the PHP array in to a JavaScript array
            var sortedArray = [];

       let headers = ['ID', 'First Name', 'Last Name' , 'Testimonial' , 'Activity' , 'Date' , 'Update'];

       let table = document.createElement('table');
       table.id = 'testimonials-table';
       let headerRow = document.createElement('tr');


       for (let i = 0 ; i < headers.length; i++) { // fill the headers

           let arrayRowCounter = i - 1;

           let headerCell = document.createElement('th');
           headerCell.innerHTML = headers[i];
           headerRow.appendChild(headerCell);

       };

       table.appendChild(headerRow); // append the cells to the header

       for (let i = 0 ; i < dataArray.length  ; i++){

           let id_count = i + 1;

           let row = document.createElement('tr');

               let cellId = document.createElement('td');
                cellId.innerHTML = (dataArray[i]['testimonialId']);
                cellId.id = 'testimonials-body-id-'+id_count;

               row.appendChild(cellId);

               let cellFirstName = document.createElement('td');
                cellFirstName.innerHTML = (dataArray[i]['firstName']);
                cellFirstName.id = 'testimonials-body-first-name-'+id_count;

               row.appendChild(cellFirstName);

               let cellLastName = document.createElement('td');
                cellLastName.innerHTML = (dataArray[i]['lastName']);
                cellLastName.id = 'testimonials-body-last-name-'+id_count;

               row.appendChild(cellLastName);

               let cellComment = document.createElement('td');
                cellComment.innerHTML = (dataArray[i]['comment']);
                cellComment.id = 'testimonials-body-testimonial-'+id_count;

               row.appendChild(cellComment);

               let cellServiceName = document.createElement('td');
                cellServiceName.innerHTML = (dataArray[i]['serviceName']);
                cellServiceName.id = 'testimonials-body-activity-'+id_count;

               row.appendChild(cellServiceName);

               let cellCreated = document.createElement('td');
                cellCreated.innerHTML = (dataArray[i]['created']);
                cellCreated.id = 'testimonials-body-date-'+id_count;

               row.appendChild(cellCreated);

               let cellButton = document.createElement('button');
               cellButton.classList.add('btn-del');
               cellButton.innerHTML = ('Update');
               cellButton.id = 'testimonials-body-update-'+id_count;
               cellButton.onclick = function (){

                   sortedArray[0] = cellId.innerHTML;
                   sortedArray[1] = cellFirstName.innerHTML;
                   sortedArray[2] = cellLastName.innerHTML;
                   sortedArray[3] = cellComment.innerHTML;
                   sortedArray[4] = cellServiceName.innerHTML;
                   sortedArray[5] = cellCreated.innerHTML;

                   switch(cellPanelChoice.value){

                       case"1":

                           let header = document.getElementById('testimonials-panel-1-heading').innerHTML = (sortedArray[3]);
                           let name = document.getElementById('testimonials-panel-1-name').innerHTML = (sortedArray[1]+" "+sortedArray[2]);
                           let date = document.getElementById('testimonials-panel-1-location').innerHTML = (sortedArray[5]);

                           break;
                   }


               }
               row.appendChild(cellButton);


               let cellPanelChoice = document.createElement('select');
               cellPanelChoice.name = 'testimonials-select-panel';
                cellPanelChoice.id = 'testimonials-body-select-'+id_count;

                for (let i = 0 ; i < 4; i++) { // give options for panels

                    let id_counter = i + 1;

                    let option = document.createElement("option");
                    option.text = "Panel "+id_counter;
                    option.value = id_counter.toString();
                    cellPanelChoice.add(option, cellPanelChoice[i]);

                }

               row.appendChild(cellPanelChoice);

           table.appendChild(row);
       }




       tableContainer.appendChild(table); // append everything to the table Div



    }

    function removeTable(){
       const removeElement = document.querySelector('#testimonials-table');
       removeElement.parentElement.removeChild(removeElement);
    }

</script>;