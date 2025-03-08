<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php'
?>
<body>
<?php
include 'navbar.php'
?>
<div id="container">
    <div id="reg_form">
        <h1>Personal Registration</h1>
        <form id="registration_form">
            <!--Name-->
            <label for="fname">Given name</label>
            <input type="text" id="fname" placeholder="First name"><br/>
            <label for="mname">Middle name</label>
            <input type="text" id="mname" placeholder="Middle name"><br/>
            <label for="lname">Family name</label>
            <input type="text" id="lname" placeholder="Last name"><br/>
            <!--DoB-->
            <label for="dob">Date of Birth</label>
            <input type="text" id="dob" placeholder="Last name"><br/>
            <!--Email-->
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="abc@example.com"><br/>
            <!--Phone-->
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" placeholder="0123-456-789"><br/>
            <!--Password-->
            <label for="pw">Password</label>
            <input type="password" id="pw"><br/>
            <label for="confirm_pw">Confirm Password</label>
            <input type="password" id="confirm_pw" placeholder="Repeat the password"><br/>
            <!--Submit Button-->
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
</body>

</html>
