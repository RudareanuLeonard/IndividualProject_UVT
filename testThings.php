<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manageitproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read image file
$data = file_get_contents($_FILES['image']['tmp_name']);

// Insert image into database
$sql = "INSERT INTO imagestest (name, data) VALUES ('" . $_FILES['image']['name'] . "', '" . $data . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
