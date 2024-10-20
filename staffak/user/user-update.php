<?php
include './koneksi.php';

$row = null;  // Inisialisasi variabel $row

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE user SET username='$username', password='$password', role='$role' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: user-read.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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
        
        input[type="text"], select {
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
    <h3>Edit User</h3>
    <?php if ($row): ?>
    <form method="post" action="">
        <table>
            <tr>
                <td>Id</td>
                <td><input type="text" name="id" value="<?php echo $row['id']; ?>" required readonly></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $row['username']; ?>" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value="<?php echo $row['password']; ?>" required></td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    <select id="role" name="role" required>
                        <option value="admin" <?php echo $row['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="pjkelas" <?php echo $row['role'] == 'pjkelas' ? 'selected' : ''; ?>>PJ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><a class="kembali" href="user-read.php">Kembali</a></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    <?php else: ?>
        <p>Data tidak ditemukan.</p>
    <?php endif; ?>
</body>
</html>
