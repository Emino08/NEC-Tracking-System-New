<?php
session_start();
include_once("config.php");
if(isset($_SESSION['username']) && isset($_SESSION['password']) == 1) {


    $problem = test_input($_POST['problems']);
    $pdescription = test_input($_POST['problems_des']);
    $others = test_input($_POST['others']);
    $username = test_input($_SESSION['username']);
    $device_type = test_input($_POST['device_type']);
//echo $problem . $pdescription . $others;
    $now = new DateTime();
    $current = $now->format('Y-m-d H:i:s');
//echo $current;

    if ($pdescription === "Others") {
        $pdescription = $others;

    }
    
    $sql = "INSERT INTO request (request, date_time,request_type,username,status,device_type) VALUES ('$pdescription', '$current', '$problem','$username',2,'$device_type')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {

        echo "Sent Successfully";
    } else {
        echo 0;
    }
}else{
    echo 1;
}
$conn->close();


?>