<!-- Connect with MySQL using object oriented MySQLi -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully" . PHP_EOL;

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  foreach ($result as $row) {
    // output data of each row
    echo "id: " . $row["id"] . " - Name: " . $row["name"] . PHP_EOL;
  }
}
else {
  echo "0 results";
}
$conn->close();