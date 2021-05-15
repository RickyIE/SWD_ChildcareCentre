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
      <link rel="stylesheet" href="css/alex_temp.css">
    <title>Contact US manage</title>
    <?php include 'header.php' ?>
    <?php require('scripts/connect.php'); ?>
  </head>

  <body>

  <?php

  $query = "SELECT created , name , message, email, phone FROM contact_us;";

  $retrieveContacts = mysqli_query($db_connection, $query);

  $dataArray = array();


  if (mysqli_num_rows($retrieveContacts) > 0) {
      // output data of each row
      while ($row = mysqli_fetch_assoc($retrieveContacts)) {
          $dataArray[] = $row;

      }

  } else {
      echo "0 results";
  }




  if ($_SERVER["REQUEST_METHOD"] == "POST") { // post on submit





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
          <div class="container" id="contact-us-outer-container-id">
              <form method='post' id="testimonials-search-form">
                  <label for="search-form-id">Search for Keyword</label>
                  <input type='search' class='dateFilter' name='search-form' id="search-form-id"
                         placeholder="Enter search criteria and click sort ...">
                  <input type='button' class="btn btn-primary" name='btn_search' value='sort' id="testimonials-search">
              </form>

              <div class="form-card-container" id="contact-us-container-id">

              </div>
          </div>
    </section>
    <?php include 'footer.html' ?>
    <div class="overlay hidden"></div>
    <script src="js/app.js"></script>
  </body>

  <script type="text/javascript">

      const dataQuery = <?php echo json_encode($dataArray); ?>;
      const tableContainer = document.querySelector('#contact-us-container-id');

      window.onload = loadEntries(dataQuery);

      function loadEntries(myArray){

          if (!!document.getElementById('contact-us-table-id') === true) {
              removeTable();
          }

          var dataArray = myArray // parse the PHP array in to a JavaScript array

          let headers = ['Created', 'Name', 'Message', 'Email', 'Phone' , 'Delete'];

          let table = document.createElement('table');
          table.id = 'contact-us-table-id';
          let headerRow = document.createElement('tr');


          for (let i = 0; i < headers.length; i++) { // fill the headers

              let headerCell = document.createElement('th');
              headerCell.innerHTML = headers[i];
              headerRow.appendChild(headerCell);

          }
          ;

          table.appendChild(headerRow); // append the cells to the header

          for (let i = 0; i < dataArray.length; i++) {

              let id_count = i + 1;

              let row = document.createElement('tr');

              let cellCreatedDate = document.createElement('td');
              cellCreatedDate.innerHTML = (dataArray[i]['created']);
              cellCreatedDate.id = 'contact-us-body-id-' + id_count;

              row.appendChild(cellCreatedDate);

              let cellName = document.createElement('td');
              cellName.innerHTML = (dataArray[i]['name']);
              cellName.id = 'contact-us-body-name-' + id_count;

              row.appendChild(cellName);

              let cellMessage = document.createElement('td');
              cellMessage.innerHTML = (dataArray[i]['message']);
              cellMessage.id = 'contact-us-body-message-' + id_count;

              row.appendChild(cellMessage);

              let cellemail = document.createElement('td');
              cellemail.innerHTML = (dataArray[i]['email']);
              cellemail.id = 'contact-us-body-email-' + id_count;

              row.appendChild(cellemail);

              let cellPhone = document.createElement('td');
              cellPhone.innerHTML = (dataArray[i]['phone']);
              cellPhone.id = 'contact-us-body-phone-' + id_count;

              row.appendChild(cellPhone);

              let cellButton = document.createElement('button');
              cellButton.classList.add('btn-del');
              cellButton.innerHTML = ('Delete');
              cellButton.id = 'contact-us-body-delete-' + id_count;
              cellButton.type = "submit";


              cellButton.onclick = function () {

              }

              row.appendChild(cellButton);

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
          const removeElement = document.querySelector('#contact-us-table-id');
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

  </html>