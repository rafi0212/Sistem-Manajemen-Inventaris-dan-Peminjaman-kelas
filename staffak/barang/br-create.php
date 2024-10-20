<?php
include './koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodebr = $_POST['kodebr'];
    $namabr = $_POST['namabr'];
    $keteranganbr = $_POST['keteranganbr'];
    $qtybr = $_POST['qtybr'];

    $sql = "INSERT INTO barang (kodebr, namabr, keteranganbr, qtybr) VALUES ('$kodebr', '$namabr', '$keteranganbr', '$qtybr')";

    if ($conn->query($sql) === TRUE) {
        header('Location: br-read.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
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
    <h3>Tambah Barang</h3>
    <form method="post" action="">
        <table>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kodebr" required></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="namabr" required></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keteranganbr" required></td>
            </tr>
            <tr>
                <td>Kuantitas</td>
                <td><input type="number" name="qtybr" required></td>
            </tr>
            <tr>
                <td><a class="kembali" href="./br-read.php">Kembali</a></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
