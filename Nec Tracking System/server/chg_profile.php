<?php
session_start();
include_once("config.php");
if(isset($_SESSION['username']) && isset($_SESSION['password']) == 1) {
    $username = $_SESSION['username'];
    $sql1 = "SELECT username, employee_name, department FROM employee WHERE username = '$username'";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_array($result);
    $details = array("username" => $row['username'], "employee_name" => $row['employee_name'], "department" => $row['department']);
    echo json_encode($details);

}else{
    echo 1;
}
?>