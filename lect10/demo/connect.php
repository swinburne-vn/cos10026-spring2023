<?php
include('settings.php');

// connect to db
$conn = mysqli_connect($host, $username, $password, $db_name);

// manipulate with db
if ($conn) {
    echo 'Connected to database.';

    $query = "SELECT * FROM cars";
    $result = mysqli_query($conn, $query);
    $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cars</h1>

    <table border="1">
        <tr>
            <th>Car ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Price</th>
            <th>YOM</th>
        </tr>

        <?php foreach ($cars as $car): ?>
            <tr>
                <td><?php echo $car['car_id']; ?></td>
                <td><?php echo $car['make']; ?></td>
                <td><?php echo $car['model']; ?></td>
                <td><?php echo $car['price']; ?></td>
                <td><?php echo $car['yom']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>
</html>