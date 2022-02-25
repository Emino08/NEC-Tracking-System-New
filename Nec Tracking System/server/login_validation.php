<?php

include_once("config.php");

$employee = test_input($_POST['username']);
$password = test_input($_POST['password']);

$errors = [];
$data = [];

if (empty($_POST['username'])) {
    $errors['username'] = 'Employee ID is required.';
}

if (empty($_POST['password'])) {
    $errors['password'] = 'Password is required.';
}


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);
