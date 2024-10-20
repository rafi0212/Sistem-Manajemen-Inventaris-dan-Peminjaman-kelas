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
        header('Location: trbr-read.php');
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
    <title>Tambah Transaksi Barang</title>
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
    <h3>Tambah Transaksi Barang</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" id="id" name="id" required>
                </td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>
                    <input type="text" id="username" name="username" required>
                </td>
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
                <td>Nama Barang Inventaris</td>
                <td>
                    <select id="kodebr" name="kodebr" required>
                        <option value="">Pilih Kode Barang</option>
                        <?php while($row = $barang_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['kodebr']; ?>"><?php echo $row['kodebr'] . " - " . $row['namabr']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Waktu Peminjaman</td>
                <td><input type="datetime-local" id="peminjamanbr" name="peminjamanbr" required></td>
            </tr>
            <tr>
                <td>Waktu Selesai Matakuliah</td>
                <td><input type="datetime-local" id="selesaibr" name="selesaibr" required></td>
            </tr>
            <tr>
                <td>Waktu Pengembalian</td>
                <td><input type="datetime-local" id="pengembalianbr" name="pengembalianbr" readonly></td>
            </tr>
            <tr>
                <td>Kuantitas Barang</td>
                <td><input type="number" id="qtybr" name="qtybr" required></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" id="keteranganbr" name="keteranganbr" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" value="Tambah">
                    <a href="trbr-read.php" class="kembali">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
   
</body>
</html>
