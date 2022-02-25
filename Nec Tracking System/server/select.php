<?php
session_start();
include_once("config.php");

$select = test_input($_POST['select']);
$username = test_input($_POST['username']);

// echo $select . " " . $username;
$sql = "UPDATE uploads SET status = '$select' WHERE upload_id = '$username'";
$result = mysqli_query($conn, $sql);

if ($result) {

    echo "Successful";
} else {
    echo 0;
}

$conn->close();
?>