<?php
session_start();
include_once("config.php");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$date = test_input($_POST['mdate']);
$memo_heading = test_input($_POST['memo_heading']);
$username = $_SESSION['username'];
if (file_exists($target_file)) {

    echo 0;
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
    echo 2;
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "rtf"
    && $imageFileType != "xlsx" ) {
//    echo "Sorry, only PDF, DOCX, PNG & RTF files are allowed.";
    echo 3;
    $uploadOk = 0;
}
// $date = date("Y-m-d h:i:sa");
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo 4;
//    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        $sql = "INSERT INTO uploads (file_name,date_time,memo_heading,username) VALUES ('$target_file','$date','$memo_heading','$username')";
       
        if ($conn->query($sql) === TRUE) {
//            echo "New record created successfully";
            echo 1;
        } else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
            echo 0;
        }

    } else {
//        echo "Sorry, there was an error uploading your file.";
        echo 0;
    }
}

?>
