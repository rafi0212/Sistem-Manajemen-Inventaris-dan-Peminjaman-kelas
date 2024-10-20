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

$transaksi = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodetrbr'])) {
    $kodetrbr = $_GET['kodetrbr'];
    $transaksi_query = "SELECT * FROM transaksibr WHERE kodetrbr='$kodetrbr'";
    $transaksi_result = $conn->query($transaksi_query);
    $transaksi = $transaksi_result->fetch_assoc();
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
    $kodetrbr = $_POST['kodetrbr'];

    $sql = "UPDATE transaksibr SET 
            id='$id', username='$username', nip='$nip', kodebr='$kodebr', 
            peminjamanbr='$peminjamanbr', selesaibr='$selesaibr', pengembalianbr='$pengembalianbr', 
            qtybr='$qtybr', keteranganbr='$keteranganbr'
            WHERE kodetrbr='$kodetrbr'";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Transaksi Barang - Acdinvent</title>
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

        table td, table th {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #fff;
            color: #333;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        select, input[type="text"], input[type="number"], input[type="datetime-local"] {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .kembali {
            padding: 8px 12px;
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
    <h3>Update Transaksi Barang</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <th>ID</th>
                <td><input type="text" id="id" name="id" value="<?php echo isset($transaksi['id']) ? $transaksi['id'] : ''; ?>" required></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td><input type="text" id="username" name="username" value="<?php echo isset($transaksi['username']) ? $transaksi['username'] : ''; ?>"></td>
            </tr>
            <tr>
                <th>Nama Dosen</th>
                <td>
                    <select id="nip" name="nip">
                        <?php while($row = $dosen_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['nip']; ?>" <?php if(isset($transaksi['nip']) && $row['nip'] == $transaksi['nip']) echo 'selected'; ?>>
                                <?php echo $row['namadosen']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Nama Barang Inventaris</th>
                <td>
                    <select id="kodebr" name="kodebr">
                        <?php while($row = $barang_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['kodebr']; ?>" <?php if(isset($transaksi['kodebr']) && $row['kodebr'] == $transaksi['kodebr']) echo 'selected'; ?>>
                                <?php echo $row['namabr']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Waktu Peminjaman</th>
                <td><input type="datetime-local" id="peminjamanbr" name="peminjamanbr" value="<?php echo isset($transaksi['peminjamanbr']) ? $transaksi['peminjamanbr'] : ''; ?>" required></td>
            </tr>
            <tr>
                <th>Waktu Selesai Matakuliah</th>
                <td><input type="datetime-local" id="selesaibr" name="selesaibr" value="<?php echo isset($transaksi['selesaibr']) ? $transaksi['selesaibr'] : ''; ?>" required></td>
            </tr>
            <tr>
                <th>Waktu Pengembalian</th>
                <td><input type="datetime-local" id="pengembalianbr" name="pengembalianbr" value="<?php echo isset($transaksi['pengembalianbr']) ? $transaksi['pengembalianbr'] : ''; ?>" readonly></td>
            </tr>
            <tr>
                <th>Kuantitas Barang</th>
                <td><input type="number" id="qtybr" name="qtybr" value="<?php echo isset($transaksi['qtybr']) ? $transaksi['qtybr'] : ''; ?>" required></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><input type="text" id="keteranganbr" name="keteranganbr" value="<?php echo isset($transaksi['keteranganbr']) ? $transaksi['keteranganbr'] : ''; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="hidden" name="kodetrbr" value="<?php echo isset($_GET['kodetrbr']) ? $_GET['kodetrbr'] : ''; ?>">
                    <input type="submit" value="Update">
                    <a href="trbr-read.php" class="kembali">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
    
</html>
