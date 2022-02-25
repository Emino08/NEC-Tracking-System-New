<?php
include_once("config.php");

$name = test_input($_POST['name']);
$email = test_input($_POST['email']);
$department = test_input($_POST['department']);
$phonenumber = test_input($_POST['phonenumber']);
$sex = test_input($_POST['sex']);
$option = test_input($_POST['option']);
$password = password_hash("Pass@12345",
    PASSWORD_DEFAULT);
// Declare a variable and initialize it
//$variable = "Emmanuel Koroma";

$num = mt_rand(1000,9999); 
  
//Remove a character after meeting a space
$variable = substr($name, 0, strpos($name, " "));
$username1 = $variable . $num;
// echo $username1;

 $sql1 = "INSERT INTO employee (department,username,email,employee_name,phone_number,sex)VALUES('$department','$username1','$email','$name','$phonenumber','$sex')";
mysqli_query($conn,$sql1);
$sql = "INSERT INTO login_tab (username,password,position )VALUES('$username1','$password','$option')";
$result = mysqli_query($conn,$sql);

    if (($result)) {
echo $username1 . " "."Successfully REGISTERED";
} else {
    echo 0;
}


  

$conn->close();
    
?>