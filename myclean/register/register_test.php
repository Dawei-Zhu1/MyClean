<?php

class TestRegister
{
    private ?string $first_name;
    private ?string $last_name;
    private ?string $gender;
    private ?string $address;
    private ?string $city;
    private ?string $state;
    private ?string $zip;
    private ?string $phone;
    private ?string $email;
    private ?string $password;
    private ?string $confirm_password;

    function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = trim($_POST["given_name"]);
            $last_name = trim($_POST["family_name"]);
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);
            $confirm_password = trim($_POST["confirm_password"]);
            // Basic Validation
            if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
//        Check null
                $errors[] = "All fields are required.";
                if ($password !== $confirm_password) {
                    $errors[] = "Passwords do not match.";
                }
            }
        }
    }
}
