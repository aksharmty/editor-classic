<?php
$connection = mysqli_connect('localhost', 'database-username', 'database-password', 'database-name');
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
?>