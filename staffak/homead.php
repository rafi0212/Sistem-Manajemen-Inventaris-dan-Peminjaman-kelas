
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .dashboard {
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
        }

        .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        h2, h3 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Table container styling */
        .table-container {
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

        /* Responsive table */
        @media (max-width: 768px) {
            table, th, td {
                display: block;
                width: 100%;
            }

            th {
                display: none;
            }

            td {
                border: none;
                position: relative;
                padding-left: 50%;
                text-align: right;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="./stmi.png" alt="STMI Logo"><br>
        </div>
        <br>
        <a href="#"><i class="fa fa-home"></i> HOME</a>
        <a href="./user/user-read.php"><i class="fa fa-user"></i> User</a>
        <a href="./barang/br-read.php"><i class="fa fa-cube"></i> Barang</a>
        <a href="./ruangan/ru-read.php"><i class="fa fa-building"></i> Ruangan</a>
        <a href="./dosen/do-read.php"><i class="fa fa-users"></i> Dosen</a>
        <a href="./transaksibr/trbr-read.php"><i class="fa fa-exchange"></i> Transaksi Barang</a>
        <a href="./transaksiru/trru-read.php"><i class="fa fa-exchange"></i> Transaksi Ruangan</a>
        <a href="./logout.php"><i class="fa fa-sign-out"></i> Logout</a>

    </div>

    <div class="content">
        <div class="dashboard">
            <h2>Selamat datang di Dashboard Admin</h2>
            <p>Ini adalah halaman khusus untuk pengguna.</p>
        </div>
    </div>

    <script>
        // Disable caching
        (function() {
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.getRegistrations().then(function(registrations) {
                    for (let registration of registrations) {
                        registration.unregister();
                    }
                });
            }
            if ('caches' in window) {
                caches.keys().then(function(keyList) {
                    return Promise.all(keyList.map(function(key) {
                        return caches.delete(key);
                    }));
                });
            }
        })();
    </script>
</body>
</html>