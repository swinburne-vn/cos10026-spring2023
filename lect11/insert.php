<?php
// connect to db
const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DBNAME = 'cos10026';

$conn = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

// insert data
$sql = "INSERT INTO cars VALUES (NULL, 'yaris', 'toyota', 12000, '2018-01-02')";
$result = mysqli_query($conn, $sql);
var_dump($result);

// close connection
mysqli_close($conn);