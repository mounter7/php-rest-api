<?php

sleep(0);

$conn = mysqli_connect('127.0.0.1', 'root', '', 'test');

if (!$conn) {
    echo 'Connection failed';
}




$input = file_get_contents('php://input');

$encoded = json_decode($input, true);

$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM dm01 WHERE id={$id} ");

if ($query) {
    echo json_encode(["msg" => "Item has removed."]);
}
