<?php
require '../Database.php';
//require_once '../functions.php';
//include_once 'register_test.php';
//$db = new Database();
//$conn = $db->conn;
$success_flag = 0;
$username = $email = $password = $confirm_password = $phone = $email = $address1 = $address2 = $postcode = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST["given_name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    $dob = trim($_POST["dob"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $address1 = trim($_POST["address1"]);
    $address2 = trim($_POST["address2"]);
    $city = trim($_POST["city"]);
    $state = trim($_POST["state"]);
    $postcode = trim($_POST["postcode"]);

    // Basic Validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)
        || empty($phone) || empty($address1) || empty($postcode) || empty($dob)) {
//        Check null
        $errors[] = "All fields are required.";
        if ($password !== $confirm_password) {
            $errors[] = "Passwords do not match.";
        }
        echo "<script>"
            . "alert('Register unsuccessfully, same page processing');"
            . "</script>";
        if ($password !== $confirm_password) {
            // Check  password
            $errors[] = "Passwords do not match.";
        }
    } else{
        return ;
    }
}
/**
 * @param string $input_type
 * @param string $element_name
 * @return string
 */
function keepContent(string $input_type, string $element_name): string
{
//    If postValue exists, get the value, else null
    $postValue = $_POST[$element_name] ?? null;
    switch ($input_type) {
        case 'checked':
            return '';
        default:
            return isset($postValue) ? htmlspecialchars($_POST[$element_name]) : '';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php $section_name = "Register";
require_once '../head.php'
?>
<body>
<?php require_once '../navbar.php' ?>
<div class="container">

    <div id="register_mode_choosing">

    </div>
    <div id="reg_form">
        <h1 class="text-center">Personal Registration</h1>
        <form id="registration_form" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!--Name-->
            <div class="row">
                <div class="col">
                    <label for="inputFirstName">Given name</label>
                    <input type="text" name="given_name" class="form-control" id="inputFirstName"
                           placeholder="First name"
                           value="<?= keepContent('text', 'given_name') ?>"
                    >
                </div>
                <div class="col">
                    <label for="inputLastName">Family Name</label>
                    <input type="text" name="family_name" class="form-control" id="inputLastName"
                           placeholder="Last name"
                           value="<?= keepContent('text', 'family_name') ?>">
                    <div class="invalid-feedback">
                        Please enter a message in the textarea.
                    </div>
                </div>
            </div>
            <!--DoB-->
            <div class="row">
                <div class="form-group">
                    <label for="inputDoB">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" id="inputDoB" placeholder="Date of birth"
                           pattern="\d{4}-\d{2}-\d{2}">
                </div>
            </div>
            <!--Email-->
            <div class="row">
                <div class="form-group">
                    <label for="inputEmail">Email address</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                           placeholder="Enter email">
                </div>
            </div>
            <!--Phone-->
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="form-control" placeholder="0123-456-789"
                       pattern="[0-9]{10}">
            </div>
            <!--Address-->
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" name="address1" class="form-control" id="inputAddress" placeholder="1 Mains Road">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" name="address2" class="form-control" id="inputAddress2"
                       placeholder="Apartment, studio, or floor">
            </div>
            <!--City-->
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City / Suburb</label>
                    <input type="text" name="city" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" name="state" class="form-control">
                        <?php
                        //                        The default
                        echo "<option selected>Choose...</option>";
                        include "../stateName.php";
                        //                        Read array
                        foreach ($state_names as $state) {
                            echo "<option>$state</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" class="form-control" id="postcode">
                </div>
            </div>
            <!--Password-->
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control" name="confirm_password"
                       placeholder="Repeat the password">
            </div>
            <!--Submit Button-->
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
        <?php
        //        $hashed_password = password_hash("aa", PASSWORD_DEFAULT);
        //        var_dump($hashed_password) . '\n';
        //        echo '<br />';
        //        echo password_verify("aa", $hashed_password) . "\n";
        //        echo password_verify("aa", $hashed_password);
        ?>
    </div>
</div>
</body>

</html>
