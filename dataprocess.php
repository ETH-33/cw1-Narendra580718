<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursework";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare('INSERT INTO order(Name, Email, Order) VALUES (?, ?, ?)');
$stmt->bind_param("sss", $name, $email, $order);


$name = $_POST['name'];
$email = $_POST['email'];
$order = $_POST['order'];
console.log($name);

$stmt->execute();

$stmt->close();
$conn->close();
?>
