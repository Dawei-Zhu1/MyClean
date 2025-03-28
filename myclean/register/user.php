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
        <form id="registration_form" method="post" action="register.php">
            <!--Name-->
            <div class="row">
                <div class="col">
                    <label for="inputFirstName">Given name</label>
                    <input type="text" name="given_name" class="form-control" id="inputFirstName"
                           placeholder="First name"
                    >
                </div>
                <div class="col">
                    <label for="inputLastName">Family Name</label>
                    <input type="text" name="family_name" class="form-control" id="inputLastName"
                           placeholder="Last name">
                </div>
            </div>
            <!--DoB-->
            <div class="row">
                <div class="form-group">
                    <label for="inputDoB">Date of Birth</label>
                    <input type="text" name="dob" class="form-control" id="inputDoB" placeholder="Date of birth"
                           pattern="">
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
                <label for="confirm_pw">Confirm Password</label>
                <input type="password" id="confirm_pw" class="form-control" placeholder="Repeat the password">
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
