<?php
$host = "localhost";        // atau 127.0.0.1
$user = "root";             // sesuaikan dengan user database Anda
$password = "";             // sesuaikan dengan password database Anda
$database = "brownies_shop"; // sesuaikan dengan nama database Anda

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>