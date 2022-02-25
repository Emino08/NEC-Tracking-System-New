<?php
session_start();
include_once("config.php");

$username = test_input($_POST['username']);
//$f_name = test_input($_POST['f_name']);
//$department= test_input($_POST['department']);
$opassword = test_input($_POST['opassword']);
$npassword = test_input($_POST['npassword']);
$rpassword= test_input($_POST['rpassword']);
$cpassword = password_hash($npassword,
    PASSWORD_DEFAULT);

if ($npassword === $rpassword){
    $sql1 = "SELECT username, password FROM login_tab WHERE username = '$username'";

    $result1 = mysqli_query($conn,$sql1);

        $row = $result1->fetch_array();
        $hash = $row["password"];

        $verify = password_verify($opassword, $hash);

        if ($verify) {

            $sql = "UPDATE login_tab SET password = '$cpassword' WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

            if ($result) {

                echo "Successfully Updated";
            } else {
                echo "Did not update, Check your details";
            }


    }else{
        echo "Failed";
    }

}else{
    echo "Password Don't match";
}

$conn->close();
?>