<?php
include_once("config.php");

$username = test_input($_POST['username']);
$name = test_input($_POST['name']);
$email = test_input($_POST['email']);
$department = test_input($_POST['department']);
$phonenumber = test_input($_POST['phonenumber']);
$sex = test_input($_POST['sex']);
$option = test_input($_POST['option']);
$password = password_hash("Pass@12345",
    PASSWORD_DEFAULT);
// Declare a variable and initialize it


 $sql1 = "UPDATE employee SET employee_name = '$name', department = '$department', email = '$email', phone_number = '$phonenumber', sex = '$sex' WHERE username = '$username'";

$edit = mysqli_query($conn,$sql1);

$sql = "UPDATE login_tab SET password = 'Pass@12345', position = '$option' WHERE username = '$username'";
$result = mysqli_query($conn,$sql);

    if (($result)) {
echo $username." ". "Successfully UPDATED";
} else {
    echo 0;
}


  

$conn->close();
    
?>