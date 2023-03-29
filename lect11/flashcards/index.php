<?php
    // connect db
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DBNAME = 'cos10026';
    $conn = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

    // get all flashcards
    $sql = "SELECT * FROM flashcards";
    $result = mysqli_query($conn, $sql);
    $flashcards = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // close connection
    mysqli_close($conn);

    if (isset($_GET['message'])) {
        $message = $_GET['message'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous" defer></script>
</head>
<body>

    <div class="container">
        <h1>All flashcards</h1>

        <?php if(isset($message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>


        <div class="text-right">
            <a href="create.php" class="btn btn-primary btn-sm">New flashcard</a>
        </div>

        <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Word</th>
                <th scope="col">Definition</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($flashcards as $flashcard): ?>
            <tr>
                <td><?php echo $flashcard['id']; ?></td>
                <td><?php echo $flashcard['word']; ?></td>
                <td><?php echo $flashcard['definition']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $flashcard['id']; ?>">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
        </table>
    </div>
</body>
</html>