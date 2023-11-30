<?php

include './../../config/db.php';
include './../../config/app.php';


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST) && isset($_POST['name']) && isset($_POST['role_id'])) {
    $id = $_POST['role_id'];
    $name = $_POST['name'];

    $sql = "UPDATE roles SET name = '$name' where id = '$id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo json_encode($successResponse);
    } else {
        echo json_encode($errorResponse);
    }
} else {
    echo json_encode($validationResponse);
}
