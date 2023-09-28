<?php

sleep(0);

$conn = mysqli_connect('127.0.0.1', 'root', '', 'test');

if (!$conn) {
    echo 'Connection failed';
}


$input = file_get_contents('php://input');

$decoded = json_decode($input, true);

$id = $decoded['id'];
$username = $decoded['username'];
$age = $decoded['age'];

$query = mysqli_query($conn, "UPDATE dm01 SET username='{$username}', age='{$age}' WHERE id={$id} ");

if ($query) {
    echo json_encode(["success" => true, "msg" => "Item has updated successfully."]);
} else {
    echo json_encode(["success" => false, "msg" => "Item update failed."]);
}
