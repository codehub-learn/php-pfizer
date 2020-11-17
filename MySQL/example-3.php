<!-- Connect with MySQL using PDO -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "demo";

try {
  $conn = new PDO("mysql:host={$servername};dbname={$dbName}", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully" . PHP_EOL;
  
  $stmt = $conn->prepare("SELECT * FROM users");
  $stmt->execute();
  
  $result = new RecursiveArrayIterator($stmt->fetchAll());
  
  foreach ($result as $row) {
    // output data of each row
    echo "id: " . $row["id"] . " - Name: " . $row["name"] . PHP_EOL;
  }
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}