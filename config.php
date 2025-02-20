<!-- LAB 5B AFIQAH AZHAR -->
<?php
$servername = "localhost";
$username = "root";  // Default for XAMPP
$password = "";      // Default for XAMPP (empty)
$database = "Lab_5b"; // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Enable error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


?>