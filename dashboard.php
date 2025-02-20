<!-- LAB 5B AFIQAH AZHAR -->
<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT matric, name, accessLevel FROM users";
$result = $conn->query($sql);
?>

<h2>User List</h2>
<table border="1">
    <tr>
        <th>Matric</th>
        <th>Name</th>
        <th>Access Level</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['matric']; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['accessLevel']; ?></td>
        <td>
            <a href="update.php?matric=<?= $row['matric']; ?>">Update</a>
            <a href="delete.php?matric=<?= $row['matric']; ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
    
</table>
<form method="post" action="logout.php">
    <button type="submit" style="margin-top: 10px; background-color: red; color: white; padding: 8px 15px; border: none; cursor: pointer;">
        Logout
    </button>
</form>


