<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    if (!isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation failed.");
    }

    // Proceed with logout
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}else{
    header('Location: index.php');
}
