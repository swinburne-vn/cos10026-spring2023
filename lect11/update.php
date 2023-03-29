<?php
// connect to db
const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DBNAME = 'cos10026';

$conn = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

// update data
$sql = "UPDATE cars SET make='Toyota' WHERE car_id =1";
$result = mysqli_query($conn, $sql);
var_dump($result);

// close connection
mysqli_close($conn);