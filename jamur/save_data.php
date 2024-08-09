<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "jamur"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari request
$temperature = isset($_GET['temperature']) ? (float) $_GET['temperature'] : null;
$humidity = isset($_GET['humidity']) ? (float) $_GET['humidity'] : null;
$status_diffuser = isset($_GET['status_diffuser']) ? $_GET['status_diffuser'] : null;

// Validasi input
if ($temperature === null || $humidity === null || $status_diffuser === null) {
  die("Invalid input: Please provide temperature, humidity, and status_diffuser");
}

if ($status_diffuser !== 'HIDUP' && $status_diffuser !== 'MATI') {
  die("Invalid input: status_diffuser must be 'HIDUP' or 'MATI'");
}

// Query untuk memasukkan data ke tabel
$sql = "INSERT INTO sensor_readings (temperature, humidity, status_diffuser) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
  die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("dds", $temperature, $humidity, $status_diffuser);

if ($stmt->execute() === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
