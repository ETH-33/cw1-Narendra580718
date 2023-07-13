<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$order = $_POST['order'];

// Validate the form data (you can add more validation as needed)

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursework";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to insert the form data
$stmt = $conn->prepare("INSERT INTO order (Name, Email, Order) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $order);

// Execute the statement
if ($stmt->execute()) {
    // Data inserted successfully
} else {
    // Error occurred while inserting data
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
