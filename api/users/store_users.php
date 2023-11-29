<?php

include './../../config/db.php';
include './../../config/app.php';


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $sql = "INSERT INTO users(name, email, password) VALUES('$name','$email','$password')";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo json_encode($successResponse);
    } else {
        echo json_encode($errorResponse);
    }
} else {
    echo json_encode($validationResponse);
}
