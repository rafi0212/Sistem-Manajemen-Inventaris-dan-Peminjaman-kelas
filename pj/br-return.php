<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "inventaris";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dosen_query = "SELECT nip, namadosen FROM dosen";
$dosen_result = $conn->query($dosen_query);

$barang_query = "SELECT kodebr, namabr FROM barang";
$barang_result = $conn->query($barang_query);

if (isset($_GET['kodetrbr'])) {
    $kodetrbr = $_GET['kodetrbr'];
    $transaksi_query = "SELECT * FROM transaksibr WHERE kodetrbr='$kodetrbr'";
    $transaksi_result = $conn->query($transaksi_query);
    $transaksi = $transaksi_result->fetch_assoc();
} else {
    die("Transaction ID not provided.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $nip = $_POST['nip'];
    $kodebr = $_POST['kodebr'];
    $peminjamanbr = $_POST['peminjamanbr'];
    $selesaibr = $_POST['selesaibr'];
    $pengembalianbr = $_POST['pengembalianbr'];
    $qtybr = $_POST['qtybr'];
    $keteranganbr = $_POST['keteranganbr'];

    $sql = "UPDATE transaksibr SET 
            id='$id', username='$username', nip='$nip', kodebr='$kodebr', 
            peminjamanbr='$peminjamanbr', selesaibr='$selesaibr', pengembalianbr='$pengembalianbr', 
            qtybr='$qtybr', keteranganbr='$keteranganbr'
            WHERE kodetrbr='$kodetrbr'";

    if ($conn->query($sql) === TRUE) {
        header('Location: br-home.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengembalian Barang - Acdinvent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Form Update Pinjam Barang</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?kodetrbr=" . $kodetrbr; ?>">
            <div class="form-group">
                <label for="id">NIM</label>
                <input type="text" id="id" name="id" value="<?php echo $transaksi['id']; ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="username">Nama Lengkap</label>
                <input type="text" id="username" name="username" value="<?php echo $transaksi['username']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nip">Nama Dosen</label>
                <input type="text" id="nip" name="nip" value="<?php echo $transaksi['nip']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="kodebr">Nama Barang</label>
                <input type="text" id="kodebr" name="kodebr" value="<?php echo $transaksi['kodebr']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="peminjamanbr">Waktu Peminjaman</label>
                <input type="datetime-local" id="peminjamanbr" name="peminjamanbr" value="<?php echo $transaksi['peminjamanbr']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="selesaibr">Waktu Selesai Matakuliah</label>
                <input type="datetime-local" id="selesaibr" name="selesaibr" value="<?php echo $transaksi['selesaibr']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="pengembalianbr">Waktu Pengembalian</label>
                <input type="datetime-local" id="pengembalianbr" name="pengembalianbr" value="<?php echo $transaksi['pengembalianbr']; ?>" required>
            </div>
            <div class="form-group">
                <label for="qtybr">Kuantitas Barang</label>
                <input type="number" id="qtybr" name="qtybr" value="<?php echo $transaksi['qtybr']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="keteranganbr">Keterangan</label>
                <input type="text" id="keteranganbr" name="keteranganbr" value="<?php echo $transaksi['keteranganbr']; ?>" readonly>
            </div>
            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
