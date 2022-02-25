<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['password']) == 1) {
    echo $_SESSION['position'];
    return;
}else{
    echo 4;
}

?>