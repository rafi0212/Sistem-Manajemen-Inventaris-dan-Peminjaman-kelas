<?php
include './koneksi.php';

if (isset($_GET['kodebr'])) {
    $kodebr = $_GET['kodebr'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $sql = "DELETE FROM barang WHERE kodebr=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kodebr);

    if ($stmt->execute()) {
        header('Location: br-read.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>