<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
</head>
<body>
    <p>This is the dashboard page only for logged in users.</p>
    <p>You're logged in as <?php echo htmlspecialchars($email); ?>.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
