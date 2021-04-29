<?php function get_details() {     
        if (empty($_POST['date']))
        {
            $date = curdate(); 
        } else {
            $date = $_POST['date'];
        }
        require ('connect.php');
        $query = "SELECT dr.recordid, c.firstname, c.lastname, dr.temperature, dr.breakfast, dr.lunch, a.activitytitle FROM daily_record dr inner join children c on dr.childid = c.childid inner join activity a on dr.activityid = a.activityid WHERE dr.created = $date";
        $result = @mysqli_query($db_connection, $query);
        $records = array();
        while ($row = mysqli_fetch_array($result)) {
        $records[] = array(  
            'recordid' => $row['recordid'],  
            'firstname' => $row['firstname'], 
            'lastname' => $row['lastname'],  
            'breakfast' => $row['breakfast'],  
            'temperature' => $row['temperature'],  
            'lunch' => $row['lunch'],  
            'activitytitle' => $row['activitytitle']
        ); 
        }
        echo print_r($records);
        include 'get_day_details.php';
        return $records;
    }
?>