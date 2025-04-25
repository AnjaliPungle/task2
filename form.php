

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "testdb"; // Change this to your actual database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure values are coming via POST
$username = $_POST['username'] ?? '';
$password =$_POST['password'] ?? '';



// Prepare and bind

$stmt = $conn->prepare("INSERT INTO sign (username, password) VALUES (?, ?)");
$stmt->bind_param("ss",$username, $password);

if ($stmt->execute()) {
    echo "Quote submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
