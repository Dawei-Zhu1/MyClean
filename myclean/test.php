<?php
session_start();
// Simulated login handling
if (isset($_POST['login'])) {
    $role = $_POST['role'];
    if ($role === 'user') {
        $_SESSION['role'] = 'user';
    } elseif ($role === 'provider') {
        $_SESSION['role'] = 'provider';
    }
} elseif (isset($_POST['logout'])) {
    session_destroy();
    header("Location: test.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login State Demo</title>
</head>
<body>
<?php if (!isset($_SESSION['role'])): ?>
    <!-- State 1: Before login -->
    <h2>Welcome, Guest!</h2>
    <p>Please log in:</p>
    <form method="POST">
        <button type="submit" name="login" value="1">
            <input type="hidden" name="role" value="user">Login as User
        </button>
    </form>
    <form method="POST">
        <button type="submit" name="login" value="1">
            <input type="hidden" name="role" value="provider">Login as Service Provider
        </button>
    </form>

<?php elseif ($_SESSION['role'] === 'user'): ?>
    <!-- State 2: Logged in as User -->
    <h2>Welcome, User!</h2>
    <p>This is the user dashboard.</p>
    <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>

<?php elseif ($_SESSION['role'] === 'provider'): ?>
    <!-- State 3: Logged in as Service Provider -->
    <h2>Welcome, Service Provider!</h2>
    <p>This is the service provider dashboard.</p>
    <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>

<?php endif; ?>
</body>
</html>
