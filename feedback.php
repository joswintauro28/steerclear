<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Select the database
    $conn->select_db($dbname);
} else {
    die("Error creating database: " . $conn->error);
}

// Create feedback table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    improvements TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $review = $conn->real_escape_string($_POST['review']);
    $rating = (int) $_POST['rating']; // Convert to integer
    $improvements = $conn->real_escape_string($_POST['improvements']);

    $sql = "INSERT INTO feedback (name, review, rating, improvements) 
            VALUES ('$name', '$review', '$rating', '$improvements')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Feedback submitted successfully!');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body { font-family: Arial, sans-serif; background-color:rgb(216, 216, 216); margin: 20px; padding: 20px; text-align: center; }
        form {background-color:rgb(152, 152, 152); border-radius: 10px; max-width: 500px; margin: auto; text-align: left; }
        label, select, textarea, input { display: block; border-radius: 5px;width: 99%; margin-bottom: 10px;}
        button { background-color:rgb(0, 34, 226); color: white; padding: 10px; border: none; cursor: pointer;border-radius: 10px; }
        button:hover { background-color:rgb(0, 1, 63); }
        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
       
    </style>
</head>
<body>
<video autoplay muted loop class="video-bg">
        <source src="carss.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    
    <h2>S T E E R - C L E A R - Feedback Form</h2>
    <p>Share your experience and rate us.</p>

    <form action="" method="POST" >
        <label  for="name"> name : <input type="text" id="name" name="name" required></label>

        <label for="review">your review: <textarea id="review" name="review" rows="4" required></textarea></label>
        

        <label>rate us:</label>
        <select name="rating" required>
            <option value="5">⭐⭐⭐⭐⭐ (5)</option>
            <option value="4">⭐⭐⭐⭐ (4)</option>
            <option value="3">⭐⭐⭐ (3)</option>
            <option value="2">⭐⭐ (2)</option>
            <option value="1">⭐ (1)</option>
        </select>

        <label for="improvements">Any Suggestions for Improvement? <textarea id="improvements" name="improvements" rows="3"></textarea></label>

        <button type="submit">submit</button>
        <button type="submit" onclick="location.href='index.php'" >back</button>
    </form>

</body>
</html>
