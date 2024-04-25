<?php

$mysqli = new mysqli('localhost', 'root', 'r00t', 'room');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM roomstatus INNER JOIN module ON module.modcod = roomstatus.modcod
     INNER JOIN lecturer ON lecturer.lectid = roomstatus.lectid INNER JOIN course ON course.coursecode = roomstatus.coursecode INNER JOIN room ON room.roomno = roomstatus.roomno");//change here for connection to another table
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
             <td><?php echo $row['slotID'] ?></td>
            <td><?php echo $row['roomNo'] ?></td>
            <td><?php echo $row['lectid'] ?></td>
            <td><?php echo $row['lecturer'] ?></td>
            <td><?php echo $row['modcod'] ?></td>
            <td><?php echo $row['module'] ?></td>
            <td><?php echo $row['day'] ?></td>
            <td><?php echo $row['start'] ?></td>
            <td><?php echo $row['end'] ?></td>
            <td><?php echo $row['capacity'] ?></td>
            <td><?php echo $row['coursecode'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['type'] ?></td>
        </tr>
        <?php   
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);

//change here for connecting to another tables

    if ($input['action'] == 'edit') {
        $mysqli->query("UPDATE roomstatus INNER JOIN lecturer SET roomstatus.roomNo='" . $input['roomNo'] . "', roomstatus.lectid='" . $input['lecturer'] . "', day='" . $input['day'] . "', start='" . $input['start'] .  "', end='" . $input['end'] . "', type='" . $input['type'] . "'WHERE slotID='" . $input['slotID'] . "'");
        
         $mysqli->query("UPDATE roomstatus INNER JOIN module SET roomstatus.modcod='" . $input['modcod'] . "' WHERE slotID='" . $input['slotID'] . "'");
        
        $mysqli->query("UPDATE roomstatus INNER JOIN course SET roomstatus.coursecode='" . $input['course'] . "' WHERE slotID='" . $input['slotID'] . "'");
        
    } else if ($input['action'] == 'delete') {
        $mysqli->query("UPDATE roomstatus SET day='vacant' WHERE slotID='" . $input['slotID'] . "'");
         $mysqli->query("DELETE  FROM roomstatus WHERE day='vacant'");
         
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE roomstatus SET day='vacant' WHERE slotID='" . $input['slotID'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);
    
}
?>