<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];

echo "<h1>Dashboard</h1>";

if ($role == 'admin') {
    echo "<a href='admin.php'>Admin Panel</a><br>";
} elseif ($role == 'model') {
    echo "<a href='register_model.php'>Complete your Model Profile</a><br>";
    echo "<a href='edit_model.php'>Edit your Model Profile</a><br>";
} elseif ($role == 'designer') {
    echo "<a href='view_models.php'>View Models</a><br>";
}
?>
