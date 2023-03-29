<?php
// connect to db
const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DBNAME = 'cos10026';

$conn = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

// create tables
$sql = "DROP TABLE IF EXISTS cars";
$result = mysqli_query($conn, $sql);
var_dump($result);

$sql = "CREATE TABLE cars (
    car_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    model VARCHAR(30) NOT NULL,
    make VARCHAR(25) NOT NULL,
    price INT NOT NULL,
    yom DATE
)";

$result = mysqli_query($conn, $sql);

var_dump($result);

// disconnect db
mysqli_close($conn);