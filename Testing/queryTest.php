<?php

DEFINE('DB_USER', 'meetalex_websiteRoot');
DEFINE('DB_PASSWORD', 'pXZOkNzt}hsIT2WAH+1X*(HGo');
DEFINE('DB_HOST', '50.87.177.72');
DEFINE('DB_NAME', 'meetalex_ChildcareDatabse');


$data = ($_POST);

    $dataPanel = intval($data['panel']);
    $firstName = strval($data['firstName']);
    $lastName = $data['lastName'];
    $activity = $data['activity'];
    $comment = $data['comment'];
    $county = $data['county'];
    $country = $data['country'];
    $date = $data['date'];

    $db_connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
    die("Could not connect to MySQL! ");
    mysqli_set_charset($db_connection, 'utf8');

    $query = "
    UPDATE testimonial_panels
    SET first_name = '$firstName' , last_name = '$lastName' , testimonial = '$comment' , activity = '$activity' , date = '$date' , county = '$county' , country = '$country'
    WHERE panel_id = '$dataPanel';";


}



?>
