<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Kalau belum login, redirect ke halaman login
    header('Location: login.php');
    exit;
}
?>
