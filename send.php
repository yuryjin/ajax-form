<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$person_name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$filenames = $_POST['files'];

$conn->query("CREATE DATABASE IF NOT EXISTS `ajaxform-database`");

mysqli_select_db($conn,"b2b2");

$sql = "CREATE TABLE IF NOT EXISTS ajaxtable(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  person_name VARCHAR(30) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  email VARCHAR(70) NOT NULL,
  filenames VARCHAR(65535) NOT NULL
)";
if(mysqli_multi_query($conn, $sql)){
  echo "Table created successfully.";
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql2 = "INSERT INTO ajaxtable (person_name, phone, email, filenames)
VALUES ('$person_name', '$phone', '$email', '$filenames')";
if(mysqli_multi_query($conn, $sql2)){
  echo "Table created successfully.";
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

//$sql = "INSERT INTO datatest2 (person_name, phone, filenames, email)
//VALUES ('John', 'Doea', 'john@example.com', 'john@example.com')";

$conn->close();

?>