<?php
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DBNAME = 'cos10026';

    $errors = '';

    if (isset($_POST['word'])) {
        $word = $_POST['word'];
        $definition = $_POST['definition'];

        if (!$word) {
            $errors .= 'Word is required. <br/>';
        } 
        
        if (!$definition) {
            $errors .= 'Definition is required. <br/>';
        } 
        
        if (!$errors) {
            // connect db
            $conn = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

            // get all flashcards
            $sql = "INSERT INTO flashcards (word, definition) VALUES ('$word', '$definition')";
            
            // TODO: sanitize
            $result = mysqli_query($conn, $sql);
            
            // close connection
            mysqli_close($conn);

            if (!$result) {
                $errors .= 'Oops! Something went wrong. Please try again';
            } else {
                // navigate user back to all flashcards
                header('Location: index.php');
            }
        }
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
        <h1>New flashcard</h1>

        <?php if ($errors): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errors; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="word" class="form-label">Word</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="word" 
                    name="word"
                    value="<?php echo isset($word) ? $word : ''; ?>"
                    >
            </div>
            <div class="mb-3">
                <label for="definition" class="form-label">Definition</label>
                <textarea class="form-control" id="definition" rows="3" name="definition"><?php echo isset($definition) ? $definition : ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

</body>
</html>