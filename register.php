<!-- LAB 5B AFIQAH AZHAR -->
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $accessLevel = $_POST['accessLevel'];

    $sql = "INSERT INTO users (matric, name, password, accessLevel) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $matric, $name, $password, $accessLevel);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.php'>Login Here</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="post">
    <br>Matric: <input type="text" name="matric" required><br>
    Name: <input type="text" name="name" required><br>
    Password: <input type="password" name="password" required><br>
    Role: 
    <select name="accessLevel" required>
        <option value="" disabled selected>Please select</option>
        <option value="admin">Student</option>
        <option value="user">Lecturer</option>
    </select><br>
    <button type="submit">Submit</button>
</form>

