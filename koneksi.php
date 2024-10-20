<?php

$host  = "localhost";
$username = "root";
$password = "";
$database = "inventaris";

$conn = new mysqli($host, $username, $password, $database);
if ($conn){
echo "database terkoneksi";
}else{
    echo "database tidak terkoneksi";
}
?>