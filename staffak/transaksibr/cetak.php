<!DOCTYPE html>
<html>
<head>
    <title>Cetak Transaksi Barang</title>
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
    </style>
</head>
<body>
    <h2>Cetak Transaksi Barang</h2>
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
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='13'>Tidak ada data.</td></tr>";
            }
            $conn->close();
            ?>
        </table>

    <script>
        // Mencetak halaman saat halaman dimuat
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
