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

  $query = "SELECT contactId, created , name , message, email, phone FROM contact_us;";

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
              <form method='post' id="contact-us-search-form">
                  <label for="search-form-contact-us-id">Search for Keyword</label>
                  <input type='search' class='dateFilter' name='search-form' id="search-form-contact-us-id"
                         placeholder="Enter search criteria and click sort ...">
                  <div>
                  <input type='button' class="btn btn-primary" name='btn_search' value='Show results' id="contact-us-search-button-id">
                      <input type='button' class="btn btn-primary" name='btn_reset' value='Reset values' id="contact-us-reset-button-id">
                  </div>
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
      const searchButton = document.querySelector('#contact-us-search-button-id').addEventListener('click', populateEntriesRegex);
      const buttonPopulate = document.querySelector('#contact-us-reset-button-id').onclick = function populateEntries() {
          loadEntries(dataQuery);
      };

      window.onload = loadEntries(dataQuery);

      function loadEntries(myArray){

          if (!!document.getElementById('contact-us-table-id') === true) {
              removeTable();
          }

          var dataArray = myArray // parse the PHP array in to a JavaScript array

          let headers = ['Created', 'Name', 'Message', 'Email', 'Phone'];

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
              cellCreatedDate.className = "contact-us-form-cell";
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

              // let cellButton = document.createElement('button');
              // cellButton.classList.add('btn-del');
              // cellButton.innerHTML = ('Delete');
              // cellButton.id = 'contact-us-body-delete-' + id_count;
              // cellButton.type = "submit";
              //
              //
              // cellButton.onclick = function () {
              //
              //     var data = new FormData();
              //     data.append('deleteMessage', dataArray[i]['contactId'].toString());
              //     var xhr = new XMLHttpRequest();
              //     xhr.open('POST', "scripts/delete_contact_message.php");
              //     xhr.send(data);
              //     window.parent.location = window.parent.location.href;
              //
              // }
              //
              // row.appendChild(cellButton);

              table.appendChild(row);
          }


          tableContainer.appendChild(table); // append everything to the table Div

      }

      function populateEntriesRegex() {

          let formInput = document.getElementById('search-form-contact-us-id');

          if (formInput.value.length > 0) {

              let arr = [];

              for (let i = 0; i < dataQuery.length; i++) {

                  let input = formInput.value.toLowerCase();
                  let regex = new RegExp(input);


                  if (regex.test(dataQuery[i]['created'].toLowerCase()) === true ||
                      regex.test(dataQuery[i]['name'].toLowerCase()) === true ||
                      regex.test(dataQuery[i]['message'].toLowerCase()) === true ||
                      regex.test(dataQuery[i]['email'].toLowerCase()) === true ||
                      regex.test(dataQuery[i]['phone'].toLowerCase()) === true) {

                      arr.push(dataQuery[i]);

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


  </script>

  </html>