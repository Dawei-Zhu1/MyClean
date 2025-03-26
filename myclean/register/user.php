<?php
require '../Database.php';
$db = new Database();
$conn = $db->conn;
//
////Error and success message
//$error = '';
//$success = '';
//
//// Check whether the method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Fetch form
//    Name
    $family_name = trim($_POST['family_name'] ?? '');
    $given_name = trim($_POST['given_name'] ?? '');
//    Email
    $email = trim($_POST['email'] ?? '');
//    Password
    $password = $_POST['password'] ?? '';
    echo "Posted";
}
//
//// Verify the input
//    if (empty($username) || empty($email) || empty($password)) {
//        $error = 'The username email and must be filled!';
//    } else {
//        // Check email format
//        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            $error = 'Invalid email address! ';
//        } else {
//            // Check username
//            $stmt = $conn->prepare("SELECT email FROM USER WHERE username = ?");
//            $stmt->bind_param("e_mail", $email);
//            $stmt->execute();
//            $stmt->store_result();
//
//            if ($stmt->num_rows > 0) {
//                $error = 'The Email address already exists! ';
//            } else {
//                // Hash
//                $password_hash = password_hash($password, PASSWORD_DEFAULT);
//
//                // Prevent SQL injection via preprocess
//                $stmt = $conn->prepare("INSERT INTO USER (first, email, password) VALUES (?, ?, ?);INSERT INTO CREDENTIAL (?)");
//                $stmt->bind_param("sss", $username, $email, $password_hash);
//
//                if ($stmt->execute()) {
//                    $success = '注册成功！';
//                    // clear all
//                    $username = $email = '';
//                } else {
//                    $error = '数据库错误: ' . $conn->error;
//                }
//            }
//            $stmt->close();
//        }
//    }
//}
//?>
<!DOCTYPE html>
<html lang="en">
<?php include '../common/head.php' ?>
<body>
<?php include '../common/navbar.php' ?>
<div class="container">
    <div id="register_mode_choosing">

    </div>
    <div id="reg_form">
        <h1 class="text-center">Personal Registration</h1>
        <form id="registration_form">
            <!--Name-->
            <div class="row">
                <div class="col">
                    <label for="inputFirstName">Given name</label>
                    <input type="text" class="form-control" id="inputFirstName" placeholder="First name"
                           name="given_name">
                </div>
                <div class="col">
                    <label for="inputLastName">Family Name</label>
                    <input type="text" class="form-control" id="inputLastName" placeholder="Last name"
                           name="family_name">
                </div>
            </div>
            <!--DoB-->
            <div class="row">
                <div class="form-group">
                    <label for="inputDoB">Date of Birth</label>
                    <input type="text" class="form-control" id="inputDoB" placeholder="Date of birth">
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
                <input type="text" name="phone" id="phone" class="form-control" placeholder="0123-456-789">
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
                    <label for="inputCity">City</label>
                    <input type="text" name="suburb" class="form-control" id="inputCity">
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
                            echo "<option>$state</option>";}
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
                <label for="confirm_pw">Confirm Password</label>
                <input type="password" id="confirm_pw" class="form-control" placeholder="Repeat the password">
            </div>
            <!--Submit Button-->
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
        <?php
        $hashed_password = password_hash("aa", PASSWORD_DEFAULT);
        var_dump($hashed_password).'\n';
        echo '<br />';
        echo password_verify("aa", $hashed_password)."\n";
        echo password_verify("aa", $hashed_password);
        ?>
    </div>
</div>
</body>

</html>
