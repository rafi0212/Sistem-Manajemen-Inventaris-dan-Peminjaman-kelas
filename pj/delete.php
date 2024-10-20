<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acdinvent - Edit Peminjaman Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        .content {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            font-size: 12px;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
        }
        .btn-warning {
            background-color: #ffc107;
            color: white;
            border: none;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <img src="dias-mechanon-logo.png" alt="Acdinvent Logo">

    <div class="user-profile">
        <img src="user-profile.jpg" alt="User Profile">
        <p onclick="toggleDropdown()">Nama Mahasiswa<br><span>Mahasiswa</span></p>
        <div class="dropdown-menu" id="userDropdown">
            <a href="#">Setting</a>
            <a href="#">Logout</a>
        </div>
    </div>
</div>

<!-- Content -->
<div class="content">
    <h3>Edit Peminjaman Barang</h3>

    <form>
        <input type="hidden" id="form-type" value="barang">
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" class="form-control" value="Contoh Nama Lengkap">
        </div>
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" id="nim" class="form-control" value="Contoh NIM">
        </div>
        <div class="form-group">
            <label for="mata-kuliah">Mata Kuliah</label>
            <input type="text" id="mata-kuliah" class="form-control" value="Contoh Mata Kuliah">
        </div>
        <div class="form-group">
            <label for="dosen">Nama Dosen</label>
            <input type="text" id="dosen" class="form-control" value="Contoh Nama Dosen">
        </div>
        <div class="form-group">
            <label for="barang">Pilihan Barang</label>
            <select id="barang" class="form-control">
                <option value="barang1">Barang 1</option>
                <option value="barang2">Barang 2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Waktu Peminjaman</label>
            <input type="datetime-local" id="tanggal" class="form-control" value="2024-07-02T10:00">
        </div>
        <div class="form-group">
            <label for="waktu-selesai">Waktu Selesai Matakuliah</label>
            <input type="datetime-local" id="waktu-selesai" class="form-control" value="2024-07-02T12:00">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function toggleDropdown() {
        const dropdownMenu = document.getElementById('userDropdown');
        if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
            dropdownMenu.style.display = 'block';
        } else {
            dropdownMenu.style.display = 'none';
        }
    }

    document.addEventListener('click', function(event) {
        const isClickInside = document.querySelector('.user-profile').contains(event.target);
        if (!isClickInside) {
            document.getElementById('userDropdown').style.display = 'none';
        }
    });
</script>
</body>
</html>