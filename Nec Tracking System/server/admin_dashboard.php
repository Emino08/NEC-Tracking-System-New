<?php
session_start();
include_once("config.php");
$sql = "SELECT (select COUNT(status) from uploads where status = 1),
(select COUNT(status) from uploads where status = 2),
(select COUNT(status) from uploads where status = 3)";
//COUNT(status) FROM request WHERE status = 0 OR status = 2
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

if ($result) {
    $value = array("accepted"=>$row[0], "rejected"=>$row[1], "processing"=>$row[2]);
//        echo $row[0] . ' '. $row[1] . " " . $row[2];
//        echo 1;
    echo json_encode($value);
} else {
    echo 0;

}
$conn->close();


?>
