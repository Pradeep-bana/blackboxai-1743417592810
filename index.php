<?php
require_once 'config/db.php';
session_start();

if (isset($_SESSION['user'])) {
    header('Location: views/profile.php');
    exit();
} else {
    header('Location: views/index.php');
    exit();
}
?>