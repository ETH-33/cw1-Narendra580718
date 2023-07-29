<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data

    $name = $_POST["name"];

    $email = $_POST["email"];

    $order = $_POST["order"];

 

    // Validate data (you can add more specific validations here)

    if (empty($name) || empty($email) || empty($order)) {

        echo "Please fill out all the fields.";

    } else {

        // Database connection parameters

        $dbHost = "localhost" ; // Replace with your database host (e.g., "localhost")

        $dbUser = "root"; // Replace with your database username

        $dbPass = ""; // Replace with your database password

        $dbName = "coursework";

 

        // Create a database connection

        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

 

        // Check connection

        if ($conn->connect_error) {
            die("Connection Failed: " .$conn->connect_error);
        }

 

        // Prepare and execute the SQL query to insert data into the "orders" table

        $sql = "INSERT INTO orders (Name, Email, Order) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sss", $name, $email, $order);

        $stmt->execute();

 

        // Close the database connection

        $stmt->close();

        $conn->close();

 

        // Display a confirmation message

        echo "Thank you, $name! Your order ($order) has been submitted successfully.";

    }

} else {

    // If the form is not submitted through POST, redirect back to the form page

    header("Location: contact.html");

    exit();

}

?>