<?php
// Database connection settings
$servername = "localhost"; // Database server (use 'localhost' if running locally)
$username = "root"; // Your MySQL username (default is 'root')
$password = ""; // Your MySQL password (default is empty for local setup)
$dbname = "test"; // The name of the database

// Create a connection to the database
$conn = new mysqli($servername, $username, $password);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) !== TRUE) {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Create table if it doesn't exist
$tableSQL = "CREATE TABLE IF NOT EXISTS testd (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    license VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    pincode VARCHAR(10) NOT NULL,
    testDate DATE NOT NULL,
    testTime TIME NOT NULL,
    car TEXT NOT NULL
)";

if ($conn->query($tableSQL) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $license = $conn->real_escape_string($_POST['license']);
    $address = $conn->real_escape_string($_POST['address']);
    $pincode = $conn->real_escape_string($_POST['pincode']);
    $testDate = $conn->real_escape_string($_POST['testDate']);
    $testTime = $conn->real_escape_string($_POST['testTime']);
    $car = implode(", ", $_POST['car']); // Convert array to comma-separated string

    // SQL query to insert form data into the database
    $sql = "INSERT INTO testd (fullName, phone, email, license, address, pincode, testDate, testTime, car) 
            VALUES ('$fullName', '$phone', '$email', '$license', '$address', '$pincode', '$testDate', '$testTime', '$car')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to success page
        header("Location: testsub.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK A TEST DRIVE (STEER CLEAR)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #dededee0;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .checkbox-group {
            margin-bottom: 20px;
        }
        .checkbox-group input {
            margin-right: 10px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }
        .book-btn {
            background-color: #5025c6f7;
            color: white;
        }
        .reset-btn {
            background-color: #f44336;
            color: white;
        }
        .home-btn {
            background-color: #000000f7;
            color: white;
        }
        .button-container button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body style="background-image:url('WhatsApp Image 2025-02-16 at 11.22.33 AM.jpeg'); background-size: cover; background-position: center;">

<div class="container">
    <h2>BOOK A TEST DRIVE (STEER CLEAR)</h2>
    <form action="testdrive.php" method="POST">
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>

        <label for="license">Driving License Number:</label>
        <input type="text" id="license" name="license" placeholder="Enter your driving license number" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" placeholder="Enter your address" required></textarea>

        <label for="pincode">Pincode:</label>
        <input type="number" id="pincode" name="pincode" placeholder="Enter your pincode" required>

        <label for="testDate">Test Drive Date:</label>
        <input type="date" id="testDate" name="testDate" required>

        <label for="testTime">Test Drive Time:</label>
        <input type="time" id="testTime" name="testTime" required>

        <div class="checkbox-group">
            <label><strong>Select Car:</strong></label>
            <input type="checkbox" id="tataHarrier" name="car[]" value="Tata Harrier">
            <label for="tataHarrier">Tata Harrier</label><br>

            <input type="checkbox" id="hyundaiCreta" name="car[]" value="Hyundai Creta">
            <label for="hyundaiCreta">Hyundai Creta</label><br>

            <input type="checkbox" id="suzukiFronx" name="car[]" value="Suzuki Fronx">
            <label for="suzukiFronx">Suzuki Fronx</label><br>

            <input type="checkbox" id="kiaSeltos" name="car[]" value="Kia Seltos">
            <label for="kiaSeltos">Kia Seltos</label><br>
        </div>

        <div class="button-container">
            <button type="submit" class="book-btn">Book</button>
            <button type="reset" class="reset-btn">Reset</button>
            <button type="button" class="home-btn" onclick="location.href='index.php'">HOME</button>
            <li><a href="terms.html" style="color: rgb(0, 25, 189);">Terms and Conditions</a></li><br>
        </div>
    </form>
</div>

</body>
</html>
