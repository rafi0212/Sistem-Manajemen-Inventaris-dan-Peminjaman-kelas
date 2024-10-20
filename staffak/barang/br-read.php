<!DOCTYPE html>
<html>
<head>
    <title>Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 20px;
        }
        
        h2 {
            text-align: center;
            color: #333;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border-radius: 3px;
            margin-left: 10px;
        }

        a:hover {
            background-color: #0056b3;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table th, table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        
        table th {
            background-color: #333;
            color: #fff;
        }
        
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .edit, .hapus {
            padding: 5px 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
        }
        
        .edit:hover, .hapus:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h2>Daftar Barang</h2>
    <a href="br-create.php">Tambah</a>
    <a href="../homead.php">kembali</a>
    <table>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Kuantitas</th>
            <th>Aksi</th>
        </tr>
        <?php

        // Include file koneksi database
        include './koneksi.php'; // Ubah path ini sesuai dengan struktur direktori Anda

        // Query SQL untuk mengambil data staf akademik
        $sql = "SELECT * FROM barang";
        $result = $conn->query($sql);

        // Cek apakah ada data yang ditemukan
        if ($result && $result->num_rows > 0) {
            // Loop untuk menampilkan data dalam tabel
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["kodebr"]. "</td>
                        <td>" . $row["namabr"]. "</td>
                        <td>" . $row["keteranganbr"]. "</td>
                        <td>" . $row["qtybr"]. "</td>
                        <td>
                            <a class='edit' href='br-update.php?kodebr=".$row["kodebr"]."'>Edit</a>
                            <a class='hapus' href='br-delete.php?kodebr=".$row["kodebr"]."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            // Jika tidak ada data yang ditemukan
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }

        // Tutup koneksi database
        $conn->close();
        ?>
    </table>
</body>
</html>
