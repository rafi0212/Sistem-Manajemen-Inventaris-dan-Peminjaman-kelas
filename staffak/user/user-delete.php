<?php
include './koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $sql = "DELETE FROM user WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        header('Location: user-read.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>