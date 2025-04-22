<?php
session_start();
include_once '../../Database.php';
include_once 'authenticate.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Put the values in separate variables
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');
    // Basic Validation, check null
    if (empty($email) || empty($password)) {
        header("Location: login.php?error=1");
        exit;
    } else {
        // Start verify the identity
        $db = new Database();
        $user_record = $db->getUser('email', $email);
        //If is varified
        if (authenticate()) {
            /*Set session info*/
            $_SESSION['uid'] = $user_record['id'];
            $user_info = $db->getUser('uid', $_SESSION['uid']);
            $_SESSION['name'] = $user_info['first_name'];
            $_SESSION['role'] = $user_info['role']; // user or provider
            $_SESSION['is_login'] = true; // user or provider

            /*Show login success info*/
            echo '<script>alert("Login successfully")</script>';
            $redirect = $_SESSION['redirect_after_login'] ?? '/index.php';
            unset($_SESSION['redirect_after_login']); // clear this

            header("Location: $redirect");
//            header('Location: ' . $_SERVER["HTTP_REFERER"]);
        } else {
            // Login fails
            header("Location: login.php?error=2");
        }
        $db->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
$section_name = 'Login';
include __DIR__ . '/../../includes/head.php';
?>
<body>
<?php include __DIR__ . '/../../includes/navbar.php' ?>
<div class="container">
    <?php // Display error message
    $error = '';
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case '1':
                $error = "Username / password is empty";
                break;
            case '2':
                $error = "Username / password is wrong";
                break;
            case '3':
                $error = "Please login first";
                break;
        }
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
' . $error . '<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 class="text-center"><?= $section_name ?></h1>

        <div class="form-group">
            <label for="inputEmail">Email Address</label>
            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email"
                   placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>
        <div id="login-pg-opt" class="justify-content-between">
            <div class="form-group form-check d-inline-block">
                <input type="checkbox" class="form-check-input" id="Check1">
                <label class="form-check-label" for="Check1">Check me out</label>
            </div>
            <a href="/forget-password">Forget password</a>
            <a href="/pages/auth/register.php">Register</a>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>