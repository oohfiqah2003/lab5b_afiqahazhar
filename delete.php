<!-- LAB 5B AFIQAH AZHAR -->
<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$matric = $_GET['matric'];
$sql = "DELETE FROM users WHERE matric = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $matric);

if ($stmt->execute()) {
    header("Location: dashboard.php");
} else {
    echo "Delete failed.";
}
?>
