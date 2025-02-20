<!-- LAB 5B AFIQAH AZHAR -->
<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['accessLevel'] = $user['accessLevel'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid username or password, try <a href='login.php'>login</a> again.";
    }
}
?>

<form method="post">
    <br>Matric: <input type="text" name="matric" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
    </form>
        <a href="register.php"><b>Register</b></a> here if you have not.


