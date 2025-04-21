<!--Authenticate.php-->
<?php
include_once '../../Database.php';
function authenticate(): bool|array
{
    $error_msg = array();
    // Detect whether the authID is provided and determine the id_type
    if (isset($_SESSION['uid'])) {
        $id_type = 'uid';
        $auth_id = htmlspecialchars($_SESSION['uid']);
    } elseif (isset($_POST['email'])) {
        $id_type = 'email';
        $auth_id = htmlspecialchars(trim($_POST['email']));
    } else {
        $error_msg[] = 'No id';
        echo "Error: " . implode('<br>', $error_msg);
        return false;
    }
    // Password
    $password = $_POST['password'];
    // whether the password is given
    if (!isset($password)) {
        $error_msg[] = ('Please enter a password');
        echo "Error: " . implode('<br>', $error_msg);
        return false;
    }

    $db = new Database();
    $user_record = $db->getUser($id_type, $auth_id);
    $hashed_password = $user_record['password'];
    //If is varified
    if (password_verify($password, $hashed_password)) {
        return true;
    } else {
        // Login fails
        $error_msg[] = 'Check your email or password';
        return false;
    }
}