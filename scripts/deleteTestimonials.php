<?php

DEFINE('DB_USER', 'meetalex_websiteRoot');
DEFINE('DB_PASSWORD', 'pXZOkNzt}hsIT2WAH+1X*(HGo');
DEFINE('DB_HOST', '50.87.177.72');
DEFINE('DB_NAME', 'meetalex_ChildcareDatabse');

        $data = ($_POST);

            for ($i = 1 ; $i <= 4 ; $i++) {

                $firstName = 'Placeholder(first name)';
                $lastName = 'Placeholder(last name)';
                $activity = 'Placeholder(activity)';
                $comment = 'Placeholder(comment)';
                $county = 'Placeholder(county)';
                $country = 'Placeholder(country)';
                $date = '0000-00-00';

                $db_connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
                die("Could not connect to MySQL! " . mysqli_connect_error());
                mysqli_set_charset($db_connection, 'utf8');

                $query = "
    UPDATE testimonial_panels
    SET first_name = '$firstName' , last_name = '$lastName' , testimonial = '$comment' , activity = '$activity' , date = '$date' , county = '$county' , country = '$country'
    WHERE panel_id = '$i';";

                $result = mysqli_query($db_connection, $query);
        }


?>
