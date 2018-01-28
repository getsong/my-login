<?php
$servername = "localhost";
$username = "root";
$password = "secret";
$dbname = "sbaq";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br>");
} else {
    echo "Connected successfully" . "<br>";
}

$sql = "INSERT INTO users (userName, passcode)
VALUES ('John', 'Doe')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>