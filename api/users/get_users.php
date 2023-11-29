<?php

include './../../config/db.php';
include './../../config/app.php';

$sql = "SELECT * from users";

$results = mysqli_query($connection, $sql);

if ($results) {
    $users = [];
    while ($row = mysqli_fetch_assoc($results)) {
        $users[] = $row;
    }

    $successResponse['data'] = $users;
    echo json_encode($successResponse);
} else {
    echo json_encode($errorResponse);
}
