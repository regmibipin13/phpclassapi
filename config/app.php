<?php

$errorResponse = [
    'status' => 'error',
    'message' => 'Something Went Wrong'
];

$successResponse = [
    'status' => 'success',
    'message' => 'Successfull !'
];
$loginValidationResponse = [
    'status' => 'error',
    'message' => 'Incorrect Credentials'
];

$validationResponse = [
    'status' => 'error',
    'message' => 'All Fields Are Mandatory'
];
$tokenError = [
    'status' => 'error',
    'message' => 'Token Invalid'
];




function generateNewToken($user_id, $length = 16)
{
    global $connection;
    $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $stringLength = strlen($stringSpace);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString = $randomString . $stringSpace[rand(0, $stringLength - 1)];
    }

    $sql = "INSERT into user_tokens(user_id, token) values('$user_id','$randomString')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        return $randomString;
    } else {
        return false;
    }
}


function checkToken($token)
{
    global $connection;
    $sql = "SELECT * from user_tokens where token = '$token'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $user_id = $row['user_id'];
            $sql2 = "SELECT * from users join roles on users.role_id = roles.id where users.id = '$user_id'";
            $result2 = mysqli_query($connection, $sql2);
            $user = mysqli_fetch_assoc($result2);
            return $user;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
