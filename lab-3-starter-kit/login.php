<?php
session_start();

if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $isValid = true;

    if (empty($email)) {
        $_SESSION['emailError'] = "Email is required.";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailError'] = "Invalid email format.";
        $isValid = false;
    } else {
        $_SESSION['emailValue'] = $email;
    }

    if (empty($password)) {
        $_SESSION['passwordError'] = "Password is required.";
        $isValid = false;
    }

    if ($isValid) {
        if (strpos($email, '@bcit.ca') !== false) {
            $_SESSION['email'] = $email;

            unset($_SESSION['emailValue']);
            unset($_SESSION['emailError']);
            unset($_SESSION['passwordError']);

            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['emailError'] = "Only @bcit.ca emails are allowed.";
        }
    }

    header("Location: login.php");
    exit();
}

$emailError = isset($_SESSION['emailError']) ? $_SESSION['emailError'] : '';
$passwordError = isset($_SESSION['passwordError']) ? $_SESSION['passwordError'] : '';
$email = isset($_SESSION['emailValue']) ? $_SESSION['emailValue'] : '';

unset($_SESSION['emailError']);
unset($_SESSION['passwordError']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form action="login.php" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <span style="color: red;"><?php echo $emailError; ?></span>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <span style="color: red;"><?php echo $passwordError; ?></span>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
