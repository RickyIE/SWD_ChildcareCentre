<?php  
  $record = "<script>document.write(child)</script>"; 
  echo "Record: " . $record;
  if (isset($record))
  {  
      // get record from database
      $query = "SELECT dr.recordid, dr.childid, c.firstname, c.lastname, dr.temperature, dr.breakfast, dr.lunch, a.activitytitle FROM daily_record dr INNER JOIN children c on dr.childid = c.childid INNER JOIN activity a on dr.activityid = a.activityid WHERE dr.recordid = '$record'";
      $result = @mysqli_query($db_connection, $query);
      $dailty_record = array();
      while ($row = mysqli_fetch_array($result)) {
        $dailty_record[] = array(  
          'recordid' => $row['recordid'],  
          'childid' => $row['childid'], 
          'firstname' => $row['firstname'], 
          'lastname' => $row['lastname'], 
          'temperature' => $row['temperature'], 
          'breakfast' => $row['breakfast'], 
          'lunch' => $row['lunch'], 
          'activitytitle' => $row['activitytitle']
        ); 
      }   
    }  
  ?> 