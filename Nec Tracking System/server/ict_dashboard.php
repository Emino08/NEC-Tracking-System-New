<?php
session_start();
include_once("config.php");
    $sql = "SELECT (select COUNT(status) from request where status = 0 OR status = 2 OR status = 1),
(select COUNT(status) from request where status = 1),
(select COUNT(status) from request where status = 2 OR status =0)";

    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);

    if ($result) {
        $value = array("total"=>$row[0], "solved"=>$row[1], "not_solved"=>$row[2]);

        echo json_encode($value);
    } else {
        echo 0;

}
$conn->close();


?>