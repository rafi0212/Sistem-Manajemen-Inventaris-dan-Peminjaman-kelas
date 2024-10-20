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

// Fetch dosen data for dropdown
$dosen_query = "SELECT nip, namadosen FROM dosen";
$dosen_result = $conn->query($dosen_query);

// Fetch ruangan data for dropdown
$ruangan_query = "SELECT koderu, namaru FROM ruangan";
$ruangan_result = $conn->query($ruangan_query);

// Initialize variables for form fields
$id = $username = $nip = $koderu = $peminjamanru = $selesairu = $pengembalianru = $qtyru = $keteranganru = "";

// Process form submission on POST
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

    // Prepare datetime values for insertion
    $peminjamanru = date('Y-m-d H:i:s', strtotime($peminjamanru));
    $selesairu = date('Y-m-d H:i:s', strtotime($selesairu));
    $pengembalianru = date('Y-m-d H:i:s', strtotime($pengembalianru));

    // Update transaksiru table using prepared statement
    $stmt = $conn->prepare("UPDATE transaksiru SET username=?, nip=?, koderu=?, peminjamanru=?, selesairu=?, pengembalianru=?, qtyru=?, keteranganru=? WHERE id=?");
    $stmt->bind_param("ssssssiss", $username, $nip, $koderu, $peminjamanru, $selesairu, $pengembalianru, $qtyru, $keteranganru, $id);

    if ($stmt->execute()) {
        $stmt->close();
        header('Location: trru-read.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch existing data based on URL parameter
if (isset($_GET['kodetrru'])) {
    $kodetrru = $_GET['kodetrru'];

    $sql_fetch = "SELECT tr.kodetrru, tr.id, tr.username, tr.nip, tr.koderu, tr.peminjamanru, tr.selesairu, tr.pengembalianru, tr.qtyru, tr.keteranganru
                  FROM transaksiru tr
                  WHERE tr.kodetrru = ?";

    $stmt_fetch = $conn->prepare($sql_fetch);
    $stmt_fetch->bind_param("s", $kodetrru);
    $stmt_fetch->execute();
    $result_fetch = $stmt_fetch->get_result();

    if ($result_fetch->num_rows == 1) {
        $row = $result_fetch->fetch_assoc();
        $id = $row['id'];
        $username = $row['username'];
        $nip = $row['nip'];
        $koderu = $row['koderu'];
        $peminjamanru = $row['peminjamanru'];
        $selesairu = $row['selesairu'];
        $pengembalianru = $row['pengembalianru'];
        $qtyru = $row['qtyru'];
        $keteranganru = $row['keteranganru'];
    } else {
        echo "Data not found";
        exit();
    }

    $stmt_fetch->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Transaksi Ruangan</title>
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
<h3>Update Transaksi Ruangan</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" id="username" name="username" value="<?php echo $username; ?>" required></td>
            </tr>
            <tr>
                <td>Nama Dosen</td>
                <td>
                    <select id="nip" name="nip" required>
                        <option value="">Pilih NIP</option>
                        <?php while($row = $dosen_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['nip']; ?>" <?php if ($row['nip'] == $nip) echo 'selected'; ?>><?php echo $row['nip'] . " - " . $row['namadosen']; ?></option>
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
                            <option value="<?php echo $row['koderu']; ?>" <?php if ($row['koderu'] == $koderu) echo 'selected'; ?>><?php echo $row['koderu'] . " - " . $row['namaru']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Waktu Peminjaman</td>
                <td><input type="datetime-local" id="peminjamanru" name="peminjamanru" value="<?php echo date('Y-m-d\TH:i', strtotime($peminjamanru)); ?>" required></td>
            </tr>
            <tr>
                <td>Waktu Selesai</td>
                <td><input type="datetime-local" id="selesairu" name="selesairu" value="<?php echo date('Y-m-d\TH:i', strtotime($selesairu)); ?>" required></td>
            </tr>
            <tr>
                <td>Waktu Pengembalian</td>
                <td><input type="datetime-local" id="pengembalianru" name="pengembalianru" value="<?php echo date('Y-m-d\TH:i', strtotime($pengembalianru)); ?>" required></td>
            </tr>
            <tr>
                <td>Kuantitas</td>
                <td><input type="number" id="qtyru" name="qtyru" value="<?php echo $qtyru; ?>" required></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" id="keteranganru" name="keteranganru" value="<?php echo $keteranganru; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                <input type="submit" value="Update">
                <a href="trru-read.php" class="kembali">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
