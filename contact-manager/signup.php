<?php
// Database configuration
$servername = "localhost";
$username = "root"; // MySQL username
$password = ""; // MySQL password (empty for localhost)
$dbname = "contact_manager_db"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Hash the password for security
    // $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    // Protect against SQL injection
    $user = mysqli_real_escape_string($conn, $user);

    // Query to insert new user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";

    if ($conn->query($sql) === TRUE) {
        // User registered successfully
        echo "Registration successful. You can now <a href='/contact-manager/'>login</a>.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!-- Signup form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>

<h2>Signup</h2>
<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="submit" value="Register">
</form>

<!-- Link to Login Page -->
<p>Already have an account? <a href="/contact-manager/">Login here</a></p>


</body>
</html>
