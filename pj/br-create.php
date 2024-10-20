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

    $sql = "INSERT INTO transaksibr (id, username, nip, kodebr, peminjamanbr, selesaibr, pengembalianbr, qtybr, keteranganbr)
            VALUES ('$id', '$username', '$nip', '$kodebr', '$peminjamanbr', '$selesaibr', '$pengembalianbr', '$qtybr', '$keteranganbr')";

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
    <title>Form Pinjam Barang - Acdinvent</title>
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
        .cancel-icon {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 24px;
            color: #a5a5a5;
            cursor: pointer;
        }
        .cancel-icon:hover {
            color: #464646;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Form Pinjam Barang</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="id">NIM</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="username">Nama Lengkap</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="nip">Nama Dosen</label>
                <select id="nip" name="nip" required>
                    <option value="">Pilih NIP</option>
                    <?php while($row = $dosen_result->fetch_assoc()): ?>
                        <option value="<?php echo $row['nip']; ?>"><?php echo $row['nip']; ?> - <?php echo $row['namadosen']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kodebr">Nama Barang Inventaris</label>
                <select id="kodebr" name="kodebr" required>
                    <option value="">Pilih Kode Barang</option>
                    <?php while($row = $barang_result->fetch_assoc()): ?>
                        <option value="<?php echo $row['kodebr']; ?>"><?php echo $row['kodebr']; ?> - <?php echo $row['namabr']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="peminjamanbr">Waktu Peminjaman</label>
                <input type="datetime-local" id="peminjamanbr" name="peminjamanbr" required>
            </div>
            <div class="form-group">
                <label for="selesaibr">Waktu Selesai Matakuliah</label>
                <input type="datetime-local" id="selesaibr" name="selesaibr" required>
            </div>
            <div class="form-group">
                <label for="pengembalianbr">Waktu Pengembalian</label>
                <input type="datetime-local" id="pengembalianbr" name="pengembalianbr" readonly>
            </div>
            <div class="form-group">
                <label for="qtybr">Kuantitas Barang</label>
                <input type="number" id="qtybr" name="qtybr" required>
            </div>
            <div class="form-group">
                <label for="keteranganbr">Keterangan</label>
                <input type="text" id="keteranganbr" name="keteranganbr" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>