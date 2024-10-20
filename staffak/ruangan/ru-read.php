<!DOCTYPE html>
<html>
<head>
    <title>Ruangan</title>
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
    <h2>Daftar Ruangan</h2>
    <a href="ru-create.php">Tambah</a>
    <a href="../homead.php">kembali</a>
    <table>
        <tr>
            <th>Kode Ruangan</th>
            <th>Nama Ruangan</th>
            <th>Keterangan</th>
            <th>Kuantitas</th>
            <th>Aksi</th>
        </tr>
        <?php

        // Include file koneksi database
        include './koneksi.php'; // Ubah path ini sesuai dengan struktur direktori Anda

        // Query SQL untuk mengambil data staf akademik
        $sql = "SELECT * FROM ruangan";
        $result = $conn->query($sql);

        // Cek apakah ada data yang ditemukan
        if ($result && $result->num_rows > 0) {
            // Loop untuk menampilkan data dalam tabel
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["koderu"]. "</td>
                        <td>" . $row["namaru"]. "</td>
                        <td>" . $row["keteranganru"]. "</td>
                        <td>" . $row["qtyru"]. "</td>
                        <td>
                            <a class='edit' href='ru-update.php?koderu=".$row["koderu"]."'>Edit</a>
                            <a class='hapus' href='ru-delete.php?koderu=".$row["koderu"]."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            // Jika tidak ada data yang ditemukan
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }

        // Tutup koneksi database
        $conn->close();
        ?>
    </table>
</body>
</html>
