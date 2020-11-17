<!-- Connect with MySQL using procedural MySQLi -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "demo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully" . PHP_EOL;

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  foreach ($result as $row) {
    // output data of each row
    echo "id: " . $row["id"] . " - Name: " . $row["name"] . PHP_EOL;
  }
}
else {
  echo "No results found";
}

mysqli_close($conn);