<?php
session_start();
include_once("config.php");
$solution = test_input($_POST['solution']);
$status = test_input($_POST['status']);
$id = test_input($_POST['username']);
$username = $_SESSION['username'];
// echo $solution . " " . $status . " ". $username;
$sql = "UPDATE request SET solution = '$solution',status = '$status', solved_by = '$username' WHERE request_id = '$id'";
$result = mysqli_query($conn, $sql);

if ($result) {

    echo "Successfully Sent";
} else {
    echo 0;
}

$conn->close();
