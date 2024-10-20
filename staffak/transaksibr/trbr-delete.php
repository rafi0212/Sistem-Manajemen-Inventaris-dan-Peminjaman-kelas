<?php
include './koneksi.php';

if (isset($_GET['kodetrbr'])) {
    $kodetrbr = $_GET['kodetrbr'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $sql = "DELETE FROM transaksibr WHERE kodetrbr=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kodetrbr);

    if ($stmt->execute()) {
        header('Location: trbr-read.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
