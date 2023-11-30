<?php

include './../../config/db.php';
include './../../config/app.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST) && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_user = "SELECT * from users where email = '$email'";
    $check_user_result = mysqli_query($connection, $check_user);
    if ($check_user_result) {
        $user = mysqli_fetch_assoc($check_user_result);
        if (password_verify($password, $user['password'])) {
            $token = generateNewToken($user['id']);
            $successResponse['token'] = $token;
            echo json_encode($successResponse);
        } else {
            echo json_encode($loginValidationResponse);
        }
    } else {
        echo json_encode($errorResponse);
    }
} else {
    echo json_encode($validationResponse);
}
