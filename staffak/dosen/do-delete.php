<?php
include './koneksi.php';

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $sql = "DELETE FROM dosen WHERE nip=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nip);

    if ($stmt->execute()) {
        header('Location: do-read.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>