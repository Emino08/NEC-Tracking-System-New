<?php
session_start();
include_once("config.php");
$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
//$password = "Pass@12345";
$sql = "SELECT username, login, password,position FROM login_tab WHERE username = '$username'";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) <2) {

    

        $row = $result->fetch_assoc();
        $hash = $row["password"];
        if($row["position"] == 0){
        $verify = password_verify($password, $hash);
        if($verify){
//            echo $verify;
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION['position'] = $row["position"];
                if(strcmp($row['login'],'0')==0){
                    echo 7;
                    return;
                }
            echo 0;

            // $_SESSION["username"] = $username;
            // $_SESSION["password"] = $password;
        }

 }else if ($row["position"] == 1){
            $verify = password_verify($password, $hash);
            if($verify){
//            echo $verify;
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    $_SESSION['position'] = $row["position"];
                if(strcmp($row['login'],'0')==0){
                    echo 7;
                    return;
                }
                echo 1;
                // $_SESSION["username"] = $username;
                // $_SESSION["password"] = $password;
            }
        }else if ($row["position"] == 2){
            $verify = password_verify($password, $hash);
            if($verify){
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                $_SESSION['position'] = $row["position"];
            if(strcmp($row['login'],'0')==0){
                echo 7;
                return;
            }
//            echo $verify;
                echo 2;
                
            }
        }


} else {
    echo 'failed';
//}
}
$conn->close();
    
?>