<?php
include './koneksi.php';

if (isset($_GET['kodetrru'])) {
    $kodetrru = $_GET['kodetrru'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $sql = "DELETE FROM transaksiru WHERE kodetrru=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kodetrru);

    if ($stmt->execute()) {
        header('Location: trru-read.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
