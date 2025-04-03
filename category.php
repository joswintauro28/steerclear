<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "test"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create 'test' database if it doesn't exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql_create_db) !== TRUE) {
    echo "Error creating database: " . $conn->error;
    exit;
}

// Select the 'test' database
$conn->select_db($database);

// Create the 'cata' table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS cata (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    carCategory VARCHAR(50) NOT NULL,
    car VARCHAR(100) NOT NULL,
    fuelType VARCHAR(50) NOT NULL,
    budget INT(10) NOT NULL
)";

if ($conn->query($sql_create_table) !== TRUE) {
    echo "Error creating table: " . $conn->error;
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carCategory = $_POST['carCategory'];
    $cars = isset($_POST['car']) ? implode(", ", $_POST['car']) : ''; // Handle multiple car selections
    $fuelType = $_POST['fuelType'];
    $budget = $_POST['budget'];

    // Prepare and bind parameters for insertion
    $stmt = $conn->prepare("INSERT INTO cata (carCategory, car, fuelType, budget) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $carCategory, $cars, $fuelType, $budget);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data submitted successfully!";
        // Redirect to another page after successful submission
        header("Location: sub.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
