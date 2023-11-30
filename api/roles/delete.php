<?php

include './../../config/db.php';
include './../../config/app.php';


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST) && isset($_POST['user_id'])) {
    $id = $_POST['user_id'];

    $sql = "DELETE FROM users where id = '$id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo json_encode($successResponse);
    } else {
        echo json_encode($errorResponse);
    }
} else {
    echo json_encode($validationResponse);
}
