<h1>Signed in</h1>

<?php
include 'use_session.php';

// check if user signed in
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo "<h1>$user</h1>";
} else {
    header('Location: sign_in.php');
}