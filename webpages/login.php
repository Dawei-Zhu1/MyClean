<!DOCTYPE html>
<html lang="en">
<?php
$section_name = 'Login';
include 'head.php';
?>
<body>
<?php
include 'navbar.php'
?>
<div class="container">
    <form>
        <h1 class="text-center">Login</h1>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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