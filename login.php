<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventaris";  // Ganti dengan nama database Anda

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize input to prevent SQL injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Verify user credentials
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, set session variables and redirect based on role
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') {
            header("Location: staffak/homead.php");
        } else {
            header("Location: pj/br-home.php");
        }
        exit;
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acdinvent</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 90px auto;
            background-color: #fff;
            padding: 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            overflow: hidden;
            position: relative;
        }
        .left-panel {
            background-color: #007bff;
            color: #fff;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .left-panel h2 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .left-panel img {
            width: 150px;
            margin: 20px 0;
        }
        .left-panel p {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }
        .right-panel {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right-panel h2 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }
        .form-group input, select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .submit-btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
        .other-options {
            margin-top: 10px;
            text-align: center;
        }
        .other-options span {
            font-size: 14px;
            color: #666;
        }
        .social-icons {
            margin-top: 10px;
        }
        .social-icons a {
            font-size: 24px;
            margin: 0 5px;
            color: #5a5a5a;
            transition: color 0.3s ease;
        }
        .social-icons a:hover {
            color: #272727;
        }
        .signup {
            text-align: center;
            margin-top: 20px;
        }
        .signup a {
            color: #007bff;
            font-weight: bold;
        }
        .signup a:hover {
            color: #004ea1;
            text-decoration: none;
        }
        .cancel-icon {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 24px;
            color: #a5a5a5;
            cursor: pointer;
        }
        .cancel-icon:hover {
            color: #464646;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <img src="../picts/M_1_W.png" alt="Acdinvent Logo" href="index.php">
            <p>Acdinvent</p>
        </div>
        <div class="right-panel">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Nama Pengguna:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Login</button>
            </form>
            <div class="other-options">
                <span>Cara lain:</span>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
        <a href="index.php" class="cancel-icon">
            <i class="fa-solid fa-circle-xmark"></i>
        </a>
    </div>
</body>
</html>
