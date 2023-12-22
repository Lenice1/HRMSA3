<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === '@dministrat0r') {
        $_SESSION['admin'] = true;
        header('Location: admin_panel.php');
    } else {
        echo 'Invalid credentials';
    }
} else {
    header('Location: login.php');
}
?>
