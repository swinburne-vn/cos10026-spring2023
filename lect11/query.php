<?php
// connect to db
const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DBNAME = 'cos10026';

$conn = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

// query data
$make = 'toyota';

$sql = "SELECT * FROM cars WHERE make='$make'";
$result = mysqli_query($conn, $sql);

while ($car = mysqli_fetch_assoc($result)) {
    print_r($car);
    echo '<br/>';
}

$car = mysqli_fetch_assoc($result);
print_r($car);

// close connection
mysqli_close($conn);