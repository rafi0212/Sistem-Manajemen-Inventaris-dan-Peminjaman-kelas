<?php
include './koneksi.php';
$row = null;

if (isset($_GET['koderu'])) {
    $koderu = $_GET['koderu'];
    $sql = "SELECT * FROM ruangan WHERE koderu = '$koderu'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $koderu = $_POST['koderu'];
    $namaru = $_POST['namaru'];
    $keteranganru = $_POST['keteranganru'];
    $qtyru = $_POST['qtyru'];

    $sql = "UPDATE ruangan SET namaru='$namaru', keteranganru='$keteranganru', qtyru='$qtyru' WHERE koderu='$koderu'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ru-read.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Ruangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
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
        
        input[type="text"] {
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
        
        .edit,
        .hapus,
        .kembali {
            padding: 7.5px 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
        
        .edit:hover,
        .hapus:hover,
        .kembali:hover {
            background-color: #555;
        }
        
        .edit {
            margin-right: 5px;
        }
        
        .kembali {
            margin-top: 1px;
        }
        
        .kembali:hover {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
</head>
<body>
    <h3>Edit Ruangan</h3>
    <?php if ($row): ?>
    <form method="post" action="">
        <table>
            <tr>
                <td>Kode Ruangan</td>
                <td><input type="text" name="koderu" value="<?php echo $row['koderu']; ?>" required readonly></td>
            </tr>
            <tr>
                <td>Nama Ruangan</td>
                <td><input type="text" name="namaru" value="<?php echo $row['namaru']; ?>" required></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keteranganru" value="<?php echo $row['keteranganru']; ?>" required></td>
            </tr>
            <tr>
                <td>Kuantitas</td>
                <td><input type="number" name="qtyru" value="<?php echo $row['qtyru']; ?>" required></td>
            </tr>
            <tr>
                <td><a class="kembali" href="./ru-read.php">Kembali</a></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    <?php else: ?>
        <p>Data tidak ditemukan.</p>
    <?php endif; ?>
</body>
</html>
