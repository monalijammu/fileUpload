<?php 
$servername="localhost";
$username = "username";
$password = "1234567890";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
website VARCHAR(30),
comment VARCHAR(30),
gender VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

if($conn->query($sql) === TRUE) {
echo "Table MyGuests created successfully";
} else {
    echo "error creating database:". $conn->error;
}
$conn->close();
?>