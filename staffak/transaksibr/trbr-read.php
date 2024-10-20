    <!DOCTYPE html>
    <html>
    <head>
        <title>Transaksi Barang</title>
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
        <h2>Daftar Transaksi Barang</h2>
        <a href="trbr-create.php">Tambah</a>
        <a href="../homead.php">kembali</a>
        <a href="./cetak.php" target="_blank">Cetak</a> 
        
        <table>
            <tr>
                <th>Kode Transaksi</th>
                <th>ID</th>
                <th>Username</th>
                <th>Nama Dosen (Matakuliah)</th>
                <th>Nama Barang</th>
                <th>Peminjaman</th>
                <th>Selesai</th>
                <th>Pengembalian</th>
                <th>Qty</th>
                <th>Keterangan</th>
                <th colspan="2">Aksi</th>
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
            $sql_transaksibr = "SELECT tb.kodetrbr, tb.id, tb.username, d.namadosen, d.matakuliah, b.namabr, tb.peminjamanbr, tb.selesaibr, tb.pengembalianbr, tb.qtybr, tb.keteranganbr
            FROM transaksibr tb
            LEFT JOIN dosen d ON tb.nip = d.nip
            LEFT JOIN barang b ON tb.kodebr = b.kodebr";
            $result_transaksibr = $conn->query($sql_transaksibr);
            if ($result_transaksibr->num_rows > 0) {
                while($row = $result_transaksibr->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['kodetrbr'] . "</td>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['namadosen'] . " (" . $row['matakuliah'] . ")</td>";
                    echo "<td>" . $row['namabr'] . "</td>";
                    echo "<td>" . $row['peminjamanbr'] . "</td>";
                    echo "<td>" . $row['selesaibr'] . "</td>";
                    echo "<td>" . $row['pengembalianbr'] . "</td>";
                    echo "<td>" . $row['qtybr'] . "</td>";
                    echo "<td>" . $row['keteranganbr'] . "</td>";
                    echo "<td style='white-space: nowrap;'>
                            <div style='display: flex; justify-content: space-between;'>
                                <a class='edit' href='trbr-update.php?kodetrbr=".$row["kodetrbr"]."'>Edit</a>
                                <a class='hapus' href='trbr-delete.php?kodetrbr=".$row["kodetrbr"]."'onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>
                            </div>
                        </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='13'>Tidak ada data.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </body>
    </html>
