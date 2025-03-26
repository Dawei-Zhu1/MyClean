<!DOCTYPE html>
<html lang="en">
<?php
$section_name = 'Forget Password';
include 'head.php';
?>
<body>
<?php include 'navbar.php' ?>
<div class="container">
    <form>
        <h1 class="text-center"><?php echo $section_name ?></h1>
        <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                   placeholder="Enter email">
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputVerification">Email address</label>
                <input type="text" class="form-control" id="inputVerification" aria-describedby="Verification Code"
                       placeholder="Enter verification code">
                <button type="submit" class="btn btn-primary col-md-2">Send</button>
            </div>
        </div>
        <div class="form-group">
            <label for="inputNewPw">New Password</label>
            <input type="password" class="form-control" id="inputNewPw" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="inputConfirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
</body>
</html>