<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jamur";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT id, temperature, humidity, status_diffuser, reading_time FROM sensor_readings";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Sensor</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Data Sensor DHT11</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Temperature (°C)</th>
    <th>Humidity (%)</th>
    <th>Status_Diffuser</th>
    <th>Reading_time</th>
  </tr>
  <?php
  if ($result->num_rows > 0 ) {
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["id"]. "</td><td>" . $row["temperature"]. "</td><td>" . $row["humidity"]. "</td><td>" . $row["status_diffuser"]. "</td><td>" . $row["reading_time"]. "</td></tr>";
      }
  } else {
      echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
  }
  $conn->close();
  ?>
</table>

</body>
</html>
