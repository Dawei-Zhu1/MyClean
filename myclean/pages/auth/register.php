<?php
session_start();
require_once __DIR__ . '/../../includes/Database.php';
require_once __DIR__ . '/../../includes/functions.php';
$success_flag = 0;
$firstname = $lastname = $email = $password = $confirm_password = $phone = $email = $address1 = $address2 = $postcode = "";
// If the form is posted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Put the values in separate variables
    $firstname = trim($_POST["first_name"]);
    $lastname = trim($_POST["last_name"]);
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
    // Basic Validation, check null
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)
        || empty($phone) || empty($address1) || empty($postcode) || empty($dob)) {
        $errors[] = "All fields are required.";
        // Check whether the password is confirmed
        if ($password !== $confirm_password) {
            // Check  password
            $errors[] = "Passwords do not match.";
        }
        header('Location: register.php?message=failed');
    } else {
        $db = new Database();
        $db->addUser(
            $firstname, $lastname, $dob,
            $email, $phone,
            $address1, $address2, $city, $state, $postcode, $password
        );
        $db->close();
        header('Location: register.php?message=success');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php $section_name = "Register";
require_once __DIR__ . '/../../includes/head.php'
?>
<body>
<?php require_once 'navbar.php' ?>
<div class="container">
    <?php
    $message = '';
    if (isset($_GET['message'])) {
        switch ($_GET['message']) {
            case 'success':
                $message = "Registered successfully.";
                echo '
<div class="alert alert-success" role="alert">
    $message
</div>';
                header('Location: login.php');
                break;
            case 'failed':
                $message = "Registration failed. Check your inputs.";
                break;
        }
    } ?>
<!--    <div id="register_mode_choosing">-->
<!--    </div>-->
    <div id="reg_form">
        <h1 class="text-center">Personal Registration</h1>
        <form id="registration_form" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!--Name-->
            <div class="row">
                <div class="col">
                    <label for="inputFirstName">Given name</label>
                    <input type="text" name="first_name" class="form-control" id="inputFirstName"
                           placeholder="First name"
                           value="<?= keepContent('text', 'first_name') ?>"
                    >
                </div>
                <div class="col">
                    <label for="inputLastName">Family Name</label>
                    <input type="text" name="last_name" class="form-control" id="inputLastName"
                           placeholder="Last name"
                           value="<?= keepContent('text', 'last_name') ?>">
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
                           pattern="\d{4}-\d{2}-\d{2}"
                           value="<?= keepContent('date', 'dob') ?>">
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
                       pattern="[0-9]{10}"
                       value="<?= keepContent('tel', 'phone') ?>">
            </div>
            <!--Address-->
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" name="address1" class="form-control" id="inputAddress" placeholder="1 Mains Road"
                       value="<?= keepContent('text', 'address1') ?>">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" name="address2" class="form-control" id="inputAddress2"
                       placeholder="Apartment, studio, or floor"
                       value="<?= keepContent('text', 'address2') ?>">
            </div>
            <!--City-->
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City / Suburb</label>
                    <input type="text" name="city" class="form-control" id="inputCity"
                           value="<?= keepContent('city', 'last_name') ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" name="state" class="form-control">
                        <?php
                        // The default
                        echo "<option selected>Choose...</option>";
                        include __DIR__ . '/../../includes/stateName.php';
                        // Read array
                        /** @var array $state_names imported from stateName.php */
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
    </div>
</div>
</body>

</html>
