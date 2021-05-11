<?php

function updateDatabase($panelNumber){

    //, $lName, $testimonial, $activity, $date, $county, $country

    DEFINE('DB_USER', 'meetalex_websiteRoot');
    DEFINE('DB_PASSWORD', 'pXZOkNzt}hsIT2WAH+1X*(HGo');
    DEFINE('DB_HOST', '50.87.177.72');
    DEFINE('DB_NAME', 'meetalex_ChildcareDatabse');
    $db_connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR
    die("Could not connect to MySQL! ". mysqli_connect_error());
    mysqli_set_charset($db_connection, 'utf8');

    $query = "
    UPDATE testimonial_panels
    SET first_name = 'first name 5' , last_name = 'last name 5' , testimonial = 'testimonial test 1', activity = 'test activity 1' , date = '2021-10-10' , county = 'Dublin 12' , country = 'Ireland'
    WHERE panel_id = ".$panelNumber.";";

    $result = mysqli_query($db_connection, $query);


    $db_connection -> close();

}


?>