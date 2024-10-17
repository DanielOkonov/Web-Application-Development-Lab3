<?php
session_start();

$isAuthenticated = isset($_SESSION['email']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome!</title>
</head>
<body>
<h1>Welcome!</h1>

<?php if ($isAuthenticated): ?>
    <p>
        <a href="dashboard.php">Dashboard</a> |
        <a href="logout.php">Logout</a>
    </p>
<?php else: ?>
    <p>
        <a href="login.php">Login</a> |
        <a href="register.php">Register</a>
    </p>
<?php endif;?>

</body>
</html>
