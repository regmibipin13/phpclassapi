<?php

include './../../config/db.php';
include './../../config/app.php';


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['user_id'])) {
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $sql = "UPDATE users SET name = '$name', email = '$email', password = '$password' where id = '$id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo json_encode($successResponse);
    } else {
        echo json_encode($errorResponse);
    }
} else {
    echo json_encode($validationResponse);
}
