<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php'
?>
<body>
<?php
include 'navbar.php'
?>
<div class="container">
    <div id="reg_form">
        <h1 class="text-center">Personal Registration</h1>
        <form id="registration_form">
            <!--Name-->
            <div class="row">
                <div class="col">
                    <label for="inputFirstName">Given name</label>
                    <input type="text" class="form-control" id="inputFirstName" placeholder="First name">
                </div>
                <div class="col">
                    <label for="inputLastName"></label>
                    <input type="text" class="form-control" id="inputLastName" placeholder="Last name">
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
                    <label for="InputEmail1">Email address</label>
                    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp"
                           placeholder="Enter email">
                </div>
            </div>
            <!--Phone-->
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" class="form-control" placeholder="0123-456-789">
            </div>
            <!--Address-->
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1 Mains Road">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <!--City-->
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
            </div>
            <!--Password-->
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword">
            </div>
            <div class="form-group">
                <label for="confirm_pw">Confirm Password</label>
                <input type="password" id="confirm_pw" class="form-control" placeholder="Repeat the password">
            </div>
            <!--Submit Button-->
            <input type="submit" value="Submit">
        </form>

    </div>
</div>
</body>

</html>
