<?php

include './../../config/db.php';
include './../../config/app.php';

if (isset($_GET) && isset($_GET['token']) && checkToken($_GET['token'])) {

    $sql = "SELECT * from users";

    $results = mysqli_query($connection, $sql);

    if ($results) {
        $users = [];
        while ($row = mysqli_fetch_assoc($results)) {

            // Getting Roles
            $role_id = $row['role_id'];
            $sql2 = "SELECT * from roles where id = '$role_id'";
            $results2 = mysqli_query($connection, $sql2);
            $row['role'] = mysqli_fetch_assoc($results2);
            // Getting Roles ends

            $users[] = $row;
        }

        $successResponse['data'] = $users;
        echo json_encode($successResponse);
    } else {
        echo json_encode($errorResponse);
    }
} else {
    echo json_encode($tokenError);
}