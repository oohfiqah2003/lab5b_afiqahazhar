<!-- LAB 5B AFIQAH AZHAR -->
<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$matric = $_GET['matric'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $accessLevel = $_POST['accessLevel'];

    $sql = "UPDATE users SET name = ?, accessLevel = ? WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $accessLevel, $matric);
    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Update failed.";
    }
}

$sql = "SELECT * FROM users WHERE matric = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $matric);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<form method="post">
    Name: <input type="text" name="name" value="<?= $user['name']; ?>" required><br>
    Access Level: 
    <select name="accessLevel">
        <option value="admin" <?= $user['accessLevel'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
        <option value="user" <?= $user['accessLevel'] == 'user' ? 'selected' : ''; ?>>User</option>
    </select><br>
    <button type="submit">Update</button>
</form>
