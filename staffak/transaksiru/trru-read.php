<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Ruangan</title>
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
    <h2>Daftar Transaksi Ruangan</h2>
    <a href="./trru-create.php">Tambah</a>
    <a href="../homead.php">Kembali</a>
    <a href='cetak.php?kodetrru=".$row["kodetrru"]."'>Cetak</a>
    <table>
    <tr>
                    <th>Kode Transaksi</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Dosen</th>
                    <th>Nama Ruangan</th>
                    <th>Waktu Peminjaman</th>
                    <th>Waktu Selesai</th>
                    <th>Waktu Pengembalian</th>
                    <th>Kuantitas</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "inventaris";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql_transaksiru = "SELECT tr.kodetrru, tr.id, tr.username, d.namadosen, d.matakuliah, r.namaru, tr.peminjamanru, tr.selesairu, tr.pengembalianru, tr.qtyru, tr.keteranganru
                                    FROM transaksiru tr
                                    LEFT JOIN dosen d ON tr.nip = d.nip
                                    LEFT JOIN ruangan r ON tr.koderu = r.koderu";
                $result_transaksiru = $conn->query($sql_transaksiru);

                if ($result_transaksiru->num_rows > 0) {
                    while($row = $result_transaksiru->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['kodetrru'] . "</td>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['namadosen'] . " (" . $row['matakuliah'] . ")</td>";
                        echo "<td>" . $row['namaru'] . "</td>";
                        echo "<td>" . $row['peminjamanru'] . "</td>";
                        echo "<td>" . $row['selesairu'] . "</td>";
                        echo "<td>" . $row['pengembalianru'] . "</td>";
                        echo "<td>" . $row['qtyru'] . "</td>";
                        echo "<td>" . $row['keteranganru'] . "</td>";
                        echo "<td style='white-space: nowrap;'>
                            <div style='display: flex; justify-content: space-between;'>
                               <a class='edit' href='trru-update.php?kodetrru=".$row["kodetrru"]."'>Edit</a>
                               <a class='hapus' href='trru-delete.php?kodetrru=".$row["kodetrru"]."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>
                           </div>
                               </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>Tidak ada data.</td></tr>";
                }

                // Close connection
                $conn->close();
                ?>
    </table>
</body>
</html>
