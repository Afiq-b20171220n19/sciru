<?php

$mysqli = new mysqli('localhost', 'root', 'r00t', 'room');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM roominfo WHERE deleted != '1' ");
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
             <td><?php echo $row['slotID'] ?></td>
            <td><?php echo $row['roomNo'] ?></td>
            <td><?php echo $row['lecturer'] ?></td>
            <td><?php echo $row['module'] ?></td>
            <td><?php echo $row['day'] ?></td>
            <td><?php echo $row['start'] ?></td>
            <td><?php echo $row['end'] ?></td>
            <td><?php echo $row['capacity'] ?></td>
            <td><?php echo $row['type'] ?></td>
        </tr>
        <?php
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);



    if ($input['action'] == 'edit') {
        $mysqli->query("UPDATE roominfo SET roomNo='" . $input['roomNo'] . "', lecturer='" . $input['lecturer'] . "', module='" . $input['module'] . "', day='" . $input['day'] . "', start='" . $input['start'] .  "', end='" . $input['end'] . "', capacity='" . $input['capacity'] . "' WHERE slotID='" . $input['slotID'] . "'");
    } else if ($input['action'] == 'delete') {
        $mysqli->query("UPDATE roominfo SET deleted=1 WHERE slotID='" . $input['slotID'] . "'");
         $mysqli->query("DELETE  FROM roominfo WHERE deleted=1");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE roominfo SET deleted=0 WHERE slotID='" . $input['slotID'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);
    
}
?>