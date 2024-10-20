<?php
include './koneksi.php';

if (isset($_GET['koderu'])) {
    $koderu = $_GET['koderu'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $sql = "DELETE FROM ruangan WHERE koderu=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $koderu);

    if ($stmt->execute()) {
        header('Location: ru-read.php');
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $koneksi->close();
}
?>
