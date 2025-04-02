<?php
include_once "Database.php";

$db = new Database();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Put the values in separate variables
    $email = $_POST["email"];
    $password = $_POST["password"];
// Basic Validation, check null
    if (empty($email) || empty($password)) {
        if (empty($email)) {
            $errors[] = "Email is required.";
        }
        if (empty($password)) {
            $errors[] = "Password must be filled in.";
        }
    } else { // Start verify the identity
        $db = new Database();
        $password_from_db = $db->getPassword($email);
        if (password_verify($password, $password_from_db)) {
            echo '<script>alert("Your password is correct")</script>';
        } else {
            echo '<script>alert("Your password is wrong")</script>';
        }
        $db->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
$section_name = 'Login';
include 'head.php';
?>
<body>
<?php include 'navbar.php' ?>
<div class="container">
    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 class="text-center"><?= $section_name ?></h1>

        <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email"
                   placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>
        <div id="login-pg-opt" class="justify-content-between">
            <div class="form-group form-check d-inline-block">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <a href="/forget-password">Forget password</a>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
</body>
</html>