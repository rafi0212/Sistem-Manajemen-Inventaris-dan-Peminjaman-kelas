<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventaris";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch dosen data
$dosen_query = "SELECT nip, namadosen FROM dosen";
$dosen_result = $conn->query($dosen_query);

// Query to fetch ruangan data
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

    // Insert into transaksiru table
    $sql = "INSERT INTO transaksiru (id, username, nip, koderu, peminjamanru, selesairu, pengembalianru, qtyru, keteranganru)
            VALUES ('$id', '$username', '$nip', '$koderu', '$peminjamanru', '$selesairu', '$pengembalianru', '$qtyru', '$keteranganru')";

    if ($conn->query($sql) === TRUE) {
        header('Location: trru-read.php');
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
    <title>Tambah Transaksi Ruangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 20px;
        }
        
        h3 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }
        
        form {
            margin: 20px auto;
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        
        table th {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: 1px solid #ccc;
        }
        
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        select, input[type="text"], input[type="number"], input[type="datetime-local"] {
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            padding: 8px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #555;
        }
        
        .kembali {
            padding: 7.5px 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            margin-top: 10px;
            display: inline-block;
        }
        
        .kembali:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h3>Tambah Transaksi Ruangan</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>ID</td>
                <td><input type="text" id="id" name="id" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" id="username" name="username" required></td>
            </tr>
            <tr>
                <td>Nama Dosen</td>
                <td>
                    <select id="nip" name="nip" required>
                        <option value="">Pilih NIP</option>
                        <?php while($row = $dosen_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['nip']; ?>"><?php echo $row['nip'] . " - " . $row['namadosen']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Ruangan</td>
                <td>
                    <select id="koderu" name="koderu" required>
                        <option value="">Pilih Kode Ruangan</option>
                        <?php while($row = $ruangan_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['koderu']; ?>"><?php echo $row['koderu'] . " - " . $row['namaru']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Waktu Peminjaman</td>
                <td><input type="datetime-local" id="peminjamanru" name="peminjamanru" required></td>
            </tr>
            <tr>
                <td>Waktu Selesai</td>
                <td><input type="datetime-local" id="selesairu" name="selesairu" required></td>
            </tr>
            <tr>
                <td>Waktu Pengembalian</td>
                <td><input type="datetime-local" id="pengembalianru" name="pengembalianru" ></td>
            </tr>
            <tr>
                <td>Kuantitas</td>
                <td><input type="number" id="qtyru" name="qtyru" required></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" id="keteranganru" name="keteranganru" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" value="Tambah">
                    <a href="trru-read.php" class="kembali">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
