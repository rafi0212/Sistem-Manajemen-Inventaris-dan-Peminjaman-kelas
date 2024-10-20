<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acdinvent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }  
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #2c3e50;
            color: white;
        }
        .header img {
            width: 50px;
            height: 50px;
        }
        .header .user-profile {
            display: flex;
            align-items: center;
            position: relative;
        }
        .header .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .header .user-profile p {
            margin: 0;
            cursor: pointer;
        }
        .header .user-profile span {
            font-weight: bold;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .dropdown-menu a {
            display: block;
            padding: 5px 10px;
            text-decoration: none;
            color: black;
        }
        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }
        .user-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #ecf0f1;
            border-bottom: 1px solid #bdc3c7;
        }
        .user-bar .not-button {
            font-weight: bold;
            color: #2c3e50;
        }
        .user-bar .right-buttons {
            display: flex;
            align-items: center;
            margin-left: auto;
        }
        .user-bar a {
            font-weight: bold;
            color: #2c3e50;
            border: none;
            background-color: transparent;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .user-bar .active, .barang:hover, .ruangan:hover {
            background-color: rgb(255, 72, 0);
            color: white;
        }
        .barang, .ruangan {
            margin-right: 10px;
        }
        .user-bar .pinjam {
            font-weight: bold;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            padding: 10px 20px;
        }
        .user-bar .pinjam:hover {
            background-color: #00438b;
        }
        .pinjam i{
            margin-right: 10px;
        }
        .content {
            padding: 20px;
        }
        .hidden {
            display: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="header">
    <img src="../picts/L1.png" alt="Acdinvent Logo">
    <div class="user-profile">
        <img src="../picts/L1.png" alt="User Profile">
        <p onclick="toggleDropdown()">Nama Mahasiswa<br><span>Mahasiswa</span></p>
        <div class="dropdown-menu" id="userDropdown">
            <a href="#">Logout</a>
        </div>
    </div>
</div>
<div class="user-bar">
    <div class="not-button">Selamat Datang di Acdinvent!</div>
    <div class="right-buttons">
        <a class="barang active" href='#'>Barang</a>
        <a class="ruangan" href='ru-home.php'>Ruangan</a>
    </div>
    <a class="pinjam" href="./br-create.php"><i class="fa-solid fa-plus"></i>Pinjam</a>
</div>
<div class="content">
    <div id="barang-content">
        <h3>Data Barang yang Dipinjam</h3>
        <table>
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Dosen</th>
                    <th>Nama Barang</th>
                    <th>Waktu Peminjaman</th>
                    <th>Waktu Selesai</th>
                    <th>Waktu Pengembalian</th>
                    <th>Kuantitas</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
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
                        echo "<td>
                                <a class='btn btn-sm btn-success' href='br-return.php?kodetrbr=".$row["kodetrbr"]."'><i class='fas fa-calendar-check'></i></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>Tidak ada data.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>