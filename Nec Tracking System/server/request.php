<?php
include_once("config.php");
// $status = test_input($_POST['status']);

$sql = "SELECT status, solved_by, username, date_time FROM request ORDER BY date_time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    // output data of each row
   $status = '';

    $count = 1;
    while($row = $result->fetch_assoc()) {
        if (strcmp($row['status'],'1')==0){
            $status = "Solved";
        }else if(strcmp($row['status'],'2')==0){
            $status = "Not Solved";
        }
$solved_by = $row['solved_by'];
$username = $row['username'];

$sql1 = "SELECT employee_name FROM employee WHERE username = '$solved_by'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    $sql2 = "SELECT department FROM employee WHERE username = '$username'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
        echo "<tr>
        <td class='w3-center'>".$count."</td>
        <td class='w3-center'>".$status."</td>
        <td class='w3-center'>".$row['date_time']."</td>
        <td class='w3-center'>".$row1['employee_name']."</td>
        <td class='w3-center'>".$row2['department']."</td>
        </tr>
        <tr>";
        $count++;

}
}
else {
    echo "0 results";
}

// }
$conn->close();
?>
