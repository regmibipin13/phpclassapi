<?php

include './../../config/db.php';
include './../../config/app.php';


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST) && isset($_POST['name'])) {

    $name = $_POST['name'];

    $sql = "INSERT INTO roles(name) VALUES('$name')";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo json_encode($successResponse);
    } else {
        echo json_encode($errorResponse);
    }
} else {
    echo json_encode($validationResponse);
}
