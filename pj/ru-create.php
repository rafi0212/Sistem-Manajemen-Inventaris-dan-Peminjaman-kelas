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

    $sql = "INSERT INTO transaksiru (id, username, nip, koderu, peminjamanru, selesairu, pengembalianru, qtyru, keteranganru)
            VALUES ('$id', '$username', '$nip', '$koderu', '$peminjamanru', '$selesairu', '$pengembalianru', '$qtyru', '$keteranganru')";

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
    <title>Form Pinjam Ruangan - Acdinvent</title>
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
        <h2>Form Pinjam Ruangan</h2>
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
                <label for="koderu">Nama Ruangan</label>
                <select id="koderu" name="koderu" required>
                    <option value="">Pilih Ruangan</option>
                    <?php while($row = $ruangan_result->fetch_assoc()): ?>
                        <option value="<?php echo $row['koderu']; ?>"><?php echo $row['koderu']; ?> - <?php echo $row['namaru']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="peminjamanru">Waktu Peminjaman</label>
                <input type="datetime-local" id="peminjamanru" name="peminjamanru" required>
            </div>
            <div class="form-group">
                <label for="selesairu">Waktu Selesai Matakuliah</label>
                <input type="datetime-local" id="selesairu" name="selesairu" required>
            </div>
            <div class="form-group">
                <label for="pengembalianru">Waktu Selesai Penggunaan Ruangan</label>
                <input type="datetime-local" id="pengembalianru" name="pengembalianru" readonly>
            </div>
            <div class="form-group">
                <label for="qtyru">Kuantitas Penggunaan Ruangan</label>
                <input type="number" id="qtyru" name="qtyru" required>
            </div>
            <div class="form-group">
                <label for="keteranganru">Keterangan</label>
                <input type="text" id="keteranganru" name="keteranganru" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>