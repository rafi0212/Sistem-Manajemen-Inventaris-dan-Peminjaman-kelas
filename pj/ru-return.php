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

$ruangan_query = "SELECT koderu, namaru FROM ruangan";
$ruangan_result = $conn->query($ruangan_query);

if (isset($_GET['kodetrru'])) {
    $kodetrru = $_GET['kodetrru'];
    $transaksi_query = "SELECT * FROM transaksiru WHERE kodetrru='$kodetrru'";
    $transaksi_result = $conn->query($transaksi_query);
    $transaksi = $transaksi_result->fetch_assoc();
} else {
    die("Transaction ID not provided.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $nip = $_POST['nip'];
    $koderu = $_POST['koderu'];
    $peminjamanru = $_POST['peminjamanru'];
    $selesairu = $_POST['selesairu'];
    $pengembalianru = $_POST['pengembalianru'];
    $qtyru = $_POST['qtyru'];
    $keteranganru = $_POST['keteranganru'];

    $sql = "UPDATE transaksiru SET 
            id='$id', username='$username', nip='$nip', koderu='$koderu', 
            peminjamanru='$peminjamanru', selesairu='$selesairu', pengembalianru='$pengembalianru', 
            qtyru='$qtyru', keteranganru='$keteranganru'
            WHERE kodetrru='$kodetrru'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ru-home.php');
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
        <h2>Form Pengembalian Ruangan</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?kodetrru=" . $kodetrru; ?>">
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
                <label for="koderu">Nama Barang</label>
                <input type="text" id="koderu" name="koderu" value="<?php echo $transaksi['koderu']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="peminjamanru">Waktu Peminjaman</label>
                <input type="datetime-local" id="peminjamanru" name="peminjamanru" value="<?php echo $transaksi['peminjamanru']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="selesairu">Waktu Selesai Matakuliah</label>
                <input type="datetime-local" id="selesairu" name="selesairu" value="<?php echo $transaksi['selesairu']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="pengembalianru">Waktu Pengembalian</label>
                <input type="datetime-local" id="pengembalianru" name="pengembalianru" value="<?php echo $transaksi['pengembalianru']; ?>" required>
            </div>
            <div class="form-group">
                <label for="qtyru">Kuantitas Barang</label>
                <input type="number" id="qtyru" name="qtyru" value="<?php echo $transaksi['qtyru']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="keteranganru">Keterangan</label>
                <input type="text" id="keteranganru" name="keteranganru" value="<?php echo $transaksi['keteranganru']; ?>" readonly>
            </div>
            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
