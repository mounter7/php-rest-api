<?php

sleep(1);

$conn = mysqli_connect('127.0.0.1', 'root', '', 'test');

if (!$conn) {
    echo 'Connection failed';
}




$output = [];

$query = mysqli_query($conn, "SELECT * FROM dm01 ORDER BY id DESC");

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $output[] = $row;
    }
} else {
    $output['empty'] = 'empty';
}

echo json_encode($output);
