<?php
include_once("config.php");

$username = test_input($_POST['username']);
//  $sql1 = "DELETE FROM employee WHERE username = '$username'";

// $edit = mysqli_query($conn,$sql1);

$sql = "DELETE FROM login_tab WHERE username = '$username'";
$result = mysqli_query($conn,$sql);

    if (($result)) {
echo $username . " ". "Successfully DELETED";
} else {
    echo 0;
}


  

$conn->close();
    
?>