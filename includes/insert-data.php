<?php

sleep(1);

$conn = mysqli_connect('127.0.0.1', 'root', '', 'test');

if (!$conn) {
    echo 'Connection failed';
}





$input = file_get_contents('php://input');
$decoded = json_decode($input, true);

if (isset($_POST)) {
    $username = $decoded['username'];
    $age = $decoded['age'];
    $query = mysqli_query($conn, "INSERT INTO dm01 (username, age) VALUES ('{$username}', {$age})");

    if ($query) {
        echo json_encode(['success' => true, 'msg' => 'Done.']);
    } else {
        echo json_encode(['success' => false]);
    }
}
